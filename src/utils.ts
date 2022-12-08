const base = 'id-' + Math.random().toString(16).slice(2);
let autoIncrement = 0;
export function generateId(): string {
	return base + autoIncrement++;
}
