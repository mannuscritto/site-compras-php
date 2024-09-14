window.onload = function() {
	pesquisarResultados()
}

const NotImplementedException = msg => {
	this.message = msg
}

const placas = new Array("MX130", "MX150", "MX230")

const pesquisarResultados = () => {
	params = getAtributos()
	for (placa of placas) {
		if (placa.includes(params.q.toUpperCase())) {
			throw NotImplementedException()
		}
	}
}

const getAtributos = () => {
	let params = new URLSearchParams(window.location.search)
	return {
		"q": `${params.get("q")}`,
		"cat": `${params.get("cat")}`
	}
}