export const setLocalStorageItem = (nome, valor) => {
    if (typeof nome === "string") {
        valor = JSON.stringify(valor)
        if (typeof  valor === "string") {
            window.localStorage.setItem(nome, valor)
        }
    }
    return null
}

export const getLocalStorageItem = (nome) => {
    let valor = window.localStorage.getItem(nome)
    if (valor != null) {
        return JSON.parse(valor)
    }
    return null
}