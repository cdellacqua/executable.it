require('dotenv').config();
const { asyncWrapper } = require('@cdellacqua/express-async-wrapper');
const cors = require('cors');
const express = require('express');
const nodemailer = require('nodemailer');
const bodyParser = require('body-parser');
const path = require('path');

const app = express();
const router = express.Router();

if (process.env.NODE_ENV === 'development') {
	app.use(cors());
}

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

app.use('/api', router);

if (process.env.NODE_ENV === 'development') {
	app.use('/', express.static(path.join(__dirname, '..', '..', 'public')));
}

router.post('/contact', asyncWrapper(async (req, res) => {
	if (!req.xhr) {
		res.status(404)
			.sendFile(path.join(__dirname, '..', '..', 'public', ['it', 'en'].includes(req.body.lang) ? req.body.lang : 'it', '404.html'));
		return;
	}
	const transporter = nodemailer.createTransport({
		host: process.env.SMTP_HOST,
		port: Number(process.env.SMTP_PORT),
		secure: Boolean(process.env.SMTP_SSL),
		auth: {
			user: process.env.SMTP_USER,
			pass: process.env.SMTP_PASS,
		},
	});
	await transporter.sendMail({
		from: process.env.SMTP_FROM,
		to: process.env.ADMIN_EMAIL,
		bcc: process.env.SMTP_FROM, // save to sent emails
		subject: 'Nuovo contatto dal form di Executable',
		html: email({
			email: req.body.email,
			phone: req.body.phone,
			message: req.body.message,
			lang: req.body.lang,
			firstName: req.body.firstName,
			lastName: req.body.lastName,
		})
	});
	res.status(204).end();
}));

app.listen(Number(process.env.PORT), process.env.HOST, () => {
	console.log(`App started at: http://${process.env.HOST}:${process.env.PORT}`)
});

function email({
	email,
	phone,
	message,
	lang,
	firstName,
	lastName
}) {
	return `<!DOCTYPE html>
<html lang="it">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Nuovo contatto dal form di Executable</title>
	<style>
		html, body {
			margin: 0;
			padding: 0;
			font-family: sans-serif;
		}

		table {
			border-spacing: 0;
			border: none;
		}

		td {
			padding: .4rem 1ch;
		}

		td>table {
			margin: -.4rem -1ch;
		}

		h1 {
			font-size: 1.2em;
			font-variant: small-caps;
			text-align: center;
		}

		h2 {
			font-size: .9em;
			text-align: center;
		}
	</style>
</head>

<body>
	<table style="margin: 0 auto;">
		<tr>
			<td style="text-align: center;">
				<h1>Nuovo contatto dal form di Executable</h1>
			</td>
		</tr>
		<tr>
			<td>
				<table>
					<tr>
						<td style="text-align: right;"><b>Data</b></td>
						<td>${new Date().toISOString()}</td>
					</tr>
					<tr>
						<td style="text-align: right;"><b>Locale</b></td>
						<td>${lang || '-'}</td>
					</tr>
					<tr>
						<td style="text-align: right;"><b>Nome</b></td>
						<td>${firstName || '-'}</td>
					</tr>
					<tr>
						<td style="text-align: right;"><b>Cognome</b></td>
						<td>${lastName || '-'}</td>
					</tr>
					<tr>
						<td style="text-align: right;"><b>Email</b></td>
						<td>${email || '-'}</td>
					</tr>
					<tr>
						<td style="text-align: right;"><b>Telefono</b></td>
						<td>${phone || '-'}</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td style="text-align: center;"><b>Messaggio</b></td>
		</tr>
		<tr>
			<td>
				<p style="text-align: justify; margin: 0 auto; max-width: 400px;">
					${message || '-'}
				</p>
			</td>
		</tr>
	</table>
</body>

</html>
`;
}