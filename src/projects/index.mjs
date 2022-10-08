import sizeOf from 'image-size';
import {join} from 'path';

function aspectRatio({width, height}) {
	return width / height;
}

function urlToPath(url) {
	return join('public', ...url.split('/').filter(Boolean));
}

function aspectRatioOf(url) {
	return aspectRatio(sizeOf(urlToPath(url)));
}

const partialProjects = [{
	name: 'Journhey',
	description: {
		it: `Social Network sperimentale orientato al mondo dei viaggi. Ho sviluppato la web app a partire da un mock up grafico e configurato il motore di rendering server side per permettere una corretta indicizzazione dei contenuti.`,
		en: `Experimental Social Network designed for travelers who want to share their experience. I developed the web app from a mockup of the UI and configured the server side rendering engine to let search engines crawl content effectively.`,
	},
	url: 'https://journhey.com/',
	urlText: 'Journhey',
	imgUrl: "/img/projects/journhey.jpg",
	company: {
		name: "Journhey",
		url: 'https://journhey.com/',
		imgUrl: "/img/projects/companies/journhey.jpg",
	}
},{
	name: 'Smart Parking',
	description: {
		it: `Piattaforma di monitoraggio delle aree di parcheggio basata sul rilevamento di veicoli tramite Computer Vision. Ho progettato l'infrastruttura di rete e integrato il servizio analisi remota del flusso video.`,
		en: `Monitoring Platform that analyzes video streams coming from IP Cameras. I built the network infrastructure and integrated the video analysis service.`,
	},
	url: 'https://huna.io/',
	urlText: 'Huna',
	imgUrl: "/img/projects/smart-parking.jpg",
	company: {
		name: "Huna",
		url: 'https://huna.io/',
		imgUrl: "/img/projects/companies/huna-small.jpg",
	}
},{
	name: 'Edoco',
	description: {
		it: `Progressive Web Application per l'emissione di documenti commerciali. Invio telematico, integrazione con stampanti termiche e listino prodotti/servizi.`,
		en: `Progressive Web Application that handles receipts. It provides a friendly user interface for creating and storing receipts online as well as an integration with thermal printers.`,
	},
	url: 'https://edoco.it/',
	urlText: 'edoco.it',
	imgUrl: "/img/projects/edoco.jpg",
	company: {
		name: "Edoco",
		url: 'https://edoco.it/',
		imgUrl: "/img/projects/companies/edoco-small.jpg",
	}
}, {
	name: 'Cube H24 Web',
	description: {
		it: `Trasformazione di un'applicazione desktop in una Progressive Web App. Tra le funzionalità: visualizzazione di dati provenienti da sensori ambientali, mappa interattiva per la loro individuazione e visualizzazione di grafici con dati aggregati sull'andamento dei valori.`,
		en: `Porting of a Desktop application to a Progressive Web App. The Web Application shows data from various sensors, it provides an interactive map to locate the sensors in a specific area and statistics based on historical data.`,
	},
	url: 'https://www.stonex.it/it/',
	urlText: 'Stonex',
	imgUrl: "/img/projects/cube-h24.jpg",
	company: {
		name: "Stonex",
		url: "https://www.stonex.it/",
		imgUrl: "/img/projects/companies/stonex-small.jpg",
	}
}, {
	name: 'Light Touch',
	description: {
		it: `Realizzazione di una sezione nell'applicativo Web Light Touch per la raccolta interattiva dei dati d'illuminazione stradale e la visualizzazione delle fotometrie.`,
		en: 'Development of a portion of a Web App called Light Touch. The section I developed provides an interactive form to collect data about street lamps, showing a preview of the street and the heatmap of the photometry',
	},
	url: 'https://huna.io/light-touch/',
	urlText: 'Huna - Light Touch',
	imgUrl: "/img/projects/light-touch.jpg",
	company: {
		url: "https://huna.io/",
		name: "Huna",
		imgUrl: "/img/projects/companies/huna-small.jpg",
	}
}, {
	name: 'Booking TouchHair',
	description: {
		it: `Portale di prenotazioni rivolto a saloni e parrucchieri. Gestione degli appuntamenti lato negozio e prenotazione dei servizi lato cliente.`,
		en: 'Booking platform targeting hairdressers and beauty centers. Shops can manage appointments through an interactive calendar, while customers can make reservations using a funnel that automatically scans for available time slots',
	},
	url: 'https://booking.touchhair.it/',
	urlText: 'Booking TouchHair',
	imgUrl: "/img/projects/booking.jpg",
	company: {
		name: "ICTec",
		url: "https://www.ictec.it/",
		imgUrl: "/img/projects/companies/ictec-small.jpg",
	}
}];

const projects = partialProjects.map((proj) => ({
	...proj,
	imgRatio: aspectRatioOf(proj.imgUrl),
	company: {
		...proj.company,
		imgRatio: aspectRatioOf(proj.company.imgUrl),
	}
}));

export default projects;