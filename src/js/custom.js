import {getProducts} from  './consume-api.js'
import {getLocalStorageItem, setLocalStorageItem} from './helpers.js'

window.onload = async () => {
    checarDados()
    
    if (!window.location.pathname.includes('.php') || window.location.pathname.includes('index')) {
        carregarInicio()
    } else if (window.location.pathname.includes('product')) {
        await carregarProduto()
        darZoom()
        onClickCarrinho()
    } else if (window.location.pathname.includes('search')) {
        window.RESULTS_PER_PAGE = 9
        carregarBusca()
    } else if (window.location.pathname.includes('checkout')) {
        carregarCarrinho()
    } else if (window.location.pathname.includes('store')) {
        window.RESULTS_PER_PAGE = 9
        carregarCategorias()
    } else if (window.location.pathname.includes('formLogin')) {
        if (getCookie('UsuarioL') != null) {
            window.location.assign('index.php')
        }
    } else if (window.location.pathname.includes('favoritos')) {
        carregarFavoritos()
    } else if (window.location.pathname.includes('orderPayment')) {
        limparCarrinho();
    }

    onClickFavoritar()
    onClickVisualizar()
    onLoadBadges()
}

const darZoom = () => {

    // Product Main img Slick
    $('#product-main-img').slick({
    infinite: true,
    speed: 300,
    dots: false,
    arrows: true,
    fade: true,
    asNavFor: '#product-imgs',
  });

    // Product imgs Slick
  $('#product-imgs').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    centerMode: true,
    focusOnSelect: true,
        centerPadding: 0,
        vertical: true,
    asNavFor: '#product-main-img',
        responsive: [{
        breakpoint: 991,
        settings: {
                    vertical: false,
                    arrows: false,
                    dots: true,
        }
      },
    ]
  });

  $('.slick-list').height(465);

    // Product img zoom
    var zoomMainProduct = document.getElementById('product-main-img');
    if (zoomMainProduct) {
        $('#product-main-img .product-preview').zoom();
    }
    }

const getParam = (nome, url = window.location.search) => {
    const params = new URLSearchParams(url)
    if (params.has(nome)) {
        return params.get(nome)
    } else {
        return null
    }
}

const getParamAsArray = (nome, url = window.location.search) => {
    let param = getParam(nome)
    if (param != null) {
        return param.split(',')
    } else {
        return new Array()
    }
}

const getPlacaById = id => {
    const placas = getLocalStorageItem('placas')
    const placa = placas.find(el => el.id == id)
    
    if (placa == undefined) {
        return null
    } else {
        return placa
    }
}

const getCurrentUser = () => {
    return getCookie('user_name') || ""
}

const getUserById = (email) =>{
    const usuarios = getLocalStorageItem('Usuarios');
    return usuarios.find(u => u.email == email);
}

const favoritar = (e) => {
    let botao = e.currentTarget
    let icone = botao.firstChild.classList
    let placa = e.currentTarget.parentElement.parentElement.parentElement

    let currentFav = {
        user: getCurrentUser(),
        id: e.currentTarget.parentElement.parentElement.parentElement.dataset.id
    }

    if (placa.dataset.fav == "false" || placa.dataset.fav == undefined) {
        icone.value = "fa fa-heart"
        placa.dataset.fav = "true"
        localStoragePushItem('favoritos', currentFav)
    } else {
        icone.value = "fa fa-heart-o"
        placa.dataset.fav = "false"
        localStorageSpliceItem('favoritos', currentFav)
    }
    onLoadBadges()
}

const onClickFavoritar = () => {
    const favBotoes = document.getElementsByClassName("add-to-wishlist")
    for (const botao of favBotoes) {
        botao.addEventListener('click', favoritar)
    }
}

const colocarCarrinho = (e) => {
    let botao = e.currentTarget
    let icone = `<i class="fa fa-shopping-cart"></i>`
    const placa = {
        id: getParam('cod'),
        quant: document.getElementById('input_qtd').value
    }

    if (botao.dataset.cart == "false" || botao.dataset.cart == undefined) {
        botao.innerHTML = `${icone} remover do carrinho`
        botao.dataset.cart = "true"
        localStoragePushItem('carrinho', placa)
    } else {
        botao.innerHTML = `${icone} adicionar ao carrinho`
        botao.dataset.cart = "false"
        localStorageSpliceItem('carrinho', placa)
    }
    onLoadBadges()
}

const onClickCarrinho = () => {
    const cartBotoes = document.getElementsByClassName("add-to-cart-btn")
    for (const botao of cartBotoes) {
        botao.addEventListener('click', colocarCarrinho)
    }
}

const visualizarProduto = (e) => {
    let botao = e.currentTarget
    let placaId = botao.parentElement.parentElement.parentElement.dataset.id

    window.location.assign(`product.php?cod=${placaId}`)
}

const onClickVisualizar = () => {
    const visualBotoes = document.getElementsByClassName("quick-view")
    for (const botao of visualBotoes) {
        botao.addEventListener('click', visualizarProduto)
    }
}

const localStoragePushItem = (name, elem) => {
    let item = getLocalStorageItem(name) || new Array()

    if (item.findIndex(i => i.id == elem.id && i.user == getCurrentUser()) == -1) {
        item.push(elem)
    }
    setLocalStorageItem(name, item)
}

const localStorageSpliceItem = (name, elem) => {
    let item = getLocalStorageItem(name)

    if (item == null) {
        console.error(`LocalStorage item undefined`)
        return
    }

    let itemIndex = item.findIndex(i => i.id == elem.id && i.user == getCurrentUser())

    if (itemIndex != -1) {
        item.splice(itemIndex, 1)
    }
    setLocalStorageItem(name, item)
}

const loadProducts = async () => {
    getProducts()
    const produtos = getLocalStorageItem('placas')
    const marcas = getLocalStorageItem('marcas').marcas

    for (const produto of produtos) {
        for (const marca of marcas) {
            if (marca.id == produto.fabricante)
                produto.fabricante = marca.nome
        }
        //produto.preco_base = parseFloat(produto.preco_base.replace('.', '').replace(',', '.'))
        produto.imagens = JSON.parse(produto.imagens)
        produto.notas = JSON.parse(produto.notas)
    }

    setLocalStorageItem('placas', produtos)
}

const checarDados = async () => {
    if (getLocalStorageItem('marcas') == null) {
        let req = await fetch('./json/marcas.json')
        let dados = await req.json()
        setLocalStorageItem('marcas', dados)
    }

    loadProducts()
}

const calcularNotaProduto = (notas) => {

    let soma = notas.reduce(function(parcial, nota, i) {
        return parcial += nota * (i+1)
    }, 0)

    let avaliacoes = notas.reduce(function(parcial, qtd) {
        return parcial += qtd
    }, 0)

    let qtdEstrelas = Math.round(soma / avaliacoes)
    let estrelas = ''

    let i

    for (i = 0; i < qtdEstrelas; i++) {
        estrelas += `<i class="fa fa-star"></i>\n`
    }

    for (; i < 5; i++) {
        estrelas += `<i class="fa fa-star-o"></i>\n`
    }

    return estrelas
}

const checarStatusFav = (id) => {
    const favoritos = getLocalStorageItem('favoritos') || new Array()
    const user = getCurrentUser()
    if (favoritos.findIndex(f => f.id == id && f.user == user) != -1) {
        return true
    } else {
        return false
    }
}

const mostrarProdutos = (produtos, container, titulo, cols = 4) => {
    if (titulo != '') {
        container.innerHTML += `<div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">${titulo}</h3>
                        </div>
                    </div>`
    }

    const categorias = new Array('Low End', 'Mid End', 'High End')

    for (const produto of produtos) {
        // apenas temporário
        produto.preco_base = parseFloat(produto.preco_base)

        //let campoNota = calcularNotaProduto(produto.notas)
        let etiquetaDesconto = produto.desconto > 0 ? `<span class="sale">-${produto.desconto}%</span>` : ''
        let isFav = checarStatusFav(produto.id)
        //console.log(`${produto.id} favoritado? ${isFav}`)

        container.innerHTML += `<div class="col-md-${cols} col-xs-6">
            <div class="product" data-id="${produto.id}" data-fav="${isFav}">
                <div class="product-img">
                    <!--<img src="./img/${produto.imagens[0]}" alt="${produto.imagens[0]}">-->
                    <img src="./img/MSI RX 590.jpg" alt="MSI RX 590">
                    <div class="product-label">
                        ${etiquetaDesconto}
                        ${produto.novo ? `<span class="new">NOVO</span>` : ``}
                    </div>
                </div>
                <div class="product-body">
                    <p class="product-category">${categorias[produto.categoria - 1]}</p>
                    <h3 class="product-name"><a href="product.php?cod=${produto.id}">${produto.fabricante} ${produto.modelo}</a></h3>
                    <h4 class="product-price">R$
                        ${(produto.preco_base * (1 - (produto.desconto / 100))).toFixed(2).toString().replace('.', ',').replace(/\B(?=(\d{3})+(?!\d))/g, ".")}
                        ${produto.desconto > 0 ? `<del class="product-old-price">${produto.preco_base.toFixed(2).toString().replace('.', ',').replace(/\B(?=(\d{3})+(?!\d))/g, ".")}</del>`: ''}
                    </h4>
                    <div class="product-rating"><i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i></div>
                    <div class="product-btns">
                        <button class="add-to-wishlist"><i class="fa fa-heart${isFav ? '' : '-o'}"></i><span class="tooltipp">Favoritar</span></button>
                        <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Visualizar</span></button>
                    </div>
                </div>
            </div>
        </div>`
    }

    container.innerHTML += `<div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>`
}

const criarPaginacao = (srcElems, countEachPage = window.RESULTS_PER_PAGE) => {
    let pagina = getParam("pg") || 1
    let params = new URLSearchParams(window.location.search)

    let qtdResultados = srcElems.length
    let paginas = Math.ceil(qtdResultados / countEachPage)
    
    let botoes = ''
    let link

    for (let i = 0; i < paginas; i++) {
        if (i+1 == pagina) {
            botoes += `<li class="active">${i+1}</li>\n`
        } else {
            params.set('pg', i+1)
            link = `${window.location.pathname}?${params.toString()}`
            botoes += `<li><a href="${link}" class="botaoPg">${i+1}</a></li>\n`
        }
    }
    
    return botoes
}

const mostrarPaginacao = (targetElement, sourceItens) => {
    let paginacao = document.createElement("ul")
    paginacao.classList = "reviews-pagination"
    paginacao.innerHTML = sourceItens

    targetElement.insertAdjacentElement('beforeend', paginacao)
}

const filtrarPlacas = (placas, marcas, termos = [], categoria) => {
    let filtradas = new Array()
    
    for (const placa of placas) {
    if (placa.estoque > 0) {
        if (categoria == 0 || categoria == placa.categoria) {
            for (const termo of termos) {
                if (placa.modelo.toUpperCase().includes(termo)) {
                    filtradas.unshift(placa)
                    break
                } else if (placa.fabricante.toUpperCase().includes(termo)) {
                    filtradas.push(placa)
                    break
                } else if (placa.descricao.toUpperCase().includes(termo)) {
                    filtradas.push(placa)
                    break
                }
            }
        }
    }
}

return filtradas
}

const construirResultados = () => {
    const termos = getParam("q")?.toUpperCase().split(" ")
    const categoria = getParam("cat")
    
    const placas = getLocalStorageItem('placas')
    const marcas = getLocalStorageItem('marcas').marcas

    let resultados = filtrarPlacas(placas, marcas, termos, categoria)
    setLocalStorageItem('resultados', resultados)

    return resultados
}

const carregarBusca = () => {
    let resultados = construirResultados()
    const elemento = document.getElementById('resultados')

    //TODO: criar funcao mostrarTitulo (X resultados de X etc)
    let params = new URLSearchParams(window.location.search)
    let termos = params.get("q") || ""
    let total = getLocalStorageItem('resultados')

    document.getElementById('termos').value = params.get('q')
    document.getElementById('select-cat').value = params.get('cat')
    elemento.innerHTML = `<div class="col-md-12">
                            <div class="section-title">
                                <h3 class="title">Resultados da busca ${termos != '' ? `por '${termos}'` : ''} </h3>
                                <h5>(${total.length} resultados encontrados)</h5>
                            </div>
                        </div>`

    resultados = recortarResultados(resultados)
    mostrarProdutos(resultados, elemento, '')
    let botoes = criarPaginacao(getLocalStorageItem('resultados'))
    mostrarPaginacao(elemento, botoes)
}

//Checa se um determinado array está salvo no localStorage
const getLocalStorageItemLength = item => {
    let itemArray = getLocalStorageItem(item)
    if (itemArray == null) {//se nao estiver
        return 0 //retorna 0
    } else {
        return itemArray.length//se estiver salvo, retorna seu comprimento
    }
}

const onLoadBadges = () => {
    const badgeFav = document.getElementById('nro_fav')
    const badgeCart = document.getElementById('nro_cart')

    const nroFavs = getLocalStorageItemLength('favoritos')
    const nroCart = getLocalStorageItemLength('carrinho')

    badgeFav.innerText = nroFavs
    badgeCart.innerText = nroCart
}

const limparCarrinho = (e) => {
    setLocalStorageItem('carrinho', [])
}

const montarTabela = (tabela, total) => {
    let produtos = getLocalStorageItem('carrinho') || new Array()

    let precoTotal = 0
    
    let itens = produtos.map((cartItem, i) => {
        const produto = getPlacaById(cartItem.id)
        if (produto === null)
            return
        let preco = (produto.preco_base * (1 - (produto.desconto / 100)) * cartItem.quant)
        precoTotal += preco
        return `<div class="order-col">
                    <div>${cartItem.quant}x ${produto.modelo} ${produto.fabricante}</div>
                    <input type="hidden" name="produtos[${i}][quant]" value="${cartItem.quant}" />
                    <input type="hidden" name="produtos[${i}][id]" value="${produto.id}" />
                    <input type="hidden" name="produtos[${i}][preco]" value="${preco.toFixed(2)}" />
                    <div>R$${preco.toFixed(2).toString().replace('.', ',').replace(/\B(?=(\d{3})+(?!\d))/g, ".")}</div>
                </div>`
    })

    for (const item of itens) {
        tabela.innerHTML += item
    }

    total.innerHTML = `R$${precoTotal.toFixed(2).toString().replace('.', ',').replace(/\B(?=(\d{3})+(?!\d))/g, ".")}
        <input type="hidden" name="precoTotal" value="${precoTotal.toFixed(2)}" />
    `
}

const carregarCarrinho = () => {
    const tabelaPedidos = document.getElementById('pedidos')
    const pedidosTotal = document.getElementById('total')

    montarTabela(tabelaPedidos, pedidosTotal)
}

const mostrarRecomendadas = (container) => {
    const placasTotal = getLocalStorageItem('placas')
    const placas = placasTotal.slice(0, 4)

    mostrarProdutos(placas, container, 'Recomendados', 3)
}

const mostrarDescontos = (container) => {
    const placasTotal = getLocalStorageItem('placas')
    const placas = placasTotal.slice(4, 12)

    mostrarProdutos(placas, container, 'Com Desconto', 3)
}

const carregarInicio = () => {
    const recomendadas = document.getElementById('secao1')
    mostrarRecomendadas(recomendadas)

    const descontos = document.getElementById('secao2')
    mostrarDescontos(descontos)
}

const arrayToDivImage = itens => {
    //itens = itens.slice(0, 4)
    
    return itens.map(function(item) {
        return `<div class="product-preview">
                    <img src="./img/${item}" alt="${item}">
                </div>`
    })
}

const elementsToString = itens => {
    let str = ''
    for (const item of itens) {
        str += item
    }
    return str
}

const isOnCart = _id => {
    const cartItens = getLocalStorageItem('carrinho') || new Array()
    const user = getCurrentUser()
    if (cartItens.findIndex(i => i.id == _id && i.user == user) != -1) {
        return true
    } else {
        return false
    }
}

const showProductInfo = (placa, container) => {
    const categorias = new Array('Low End', 'Mid End', 'High End')

    container.breadcrumb.categoria.innerText = categorias[placa.categoria-1]
    container.breadcrumb.categoria.href = `store.php?cat=${placa.categoria}`

    container.breadcrumb.modelo.innerText = placa.modelo

    let divImages = arrayToDivImage(placa.imagens)
    let divImagesStr = elementsToString(divImages)

    container.imagens.principais.innerHTML = divImagesStr
    container.imagens.thumbs.innerHTML = divImagesStr

    container.detalhes.nome.innerText = placa.descricao
    container.detalhes.nota.innerHTML = calcularNotaProduto(placa.notas)
    container.detalhes.avaliacoes.innerText = placa.notas.reduce(function(parcial, nota) {
        return parcial += nota
    }, 0)
    container.detalhes.preco.innerText = `R$${(placa.preco_base * (1 - (placa.desconto / 100))).toFixed(2).toString().replace('.', ',').replace(/\B(?=(\d{3})+(?!\d))/g, ".")}`
    container.detalhes.precoBase.innerText = `${placa.desconto > 0 ? `R$${placa.preco_base.toFixed(2).toString().replace('.', ',').replace(/\B(?=(\d{3})+(?!\d))/g, ".")}`: ''}`
    container.detalhes.disp.innerText = `${placa.estoque > 0 ? 'Em estoque' : 'Não disponível'}`
    container.detalhes.qtd.value = 1
    container.detalhes.qtd.min = 1
    container.detalhes.qtd.max = placa.estoque

    const onCart = isOnCart(placa.id)
    container.detalhes.cartBtn.dataset.cart = onCart
    container.detalhes.cartBtn.innerHTML = `<i class="fa fa-shopping-cart">`
    container.detalhes.cartBtn.innerHTML += ` ${onCart ? `Remover do carrinho` : `Adicionar ao carrinho`}`
}

const carregarProduto = async () => {
    const codigo = getParam('cod')
    if (!codigo) {
        window.location.assign('index.php')
    }
    const placa = getPlacaById(codigo)
    if (!placa) {
        //window.location.assign('index.php') 
    }

    const container = {
        breadcrumb: {
            categoria: document.getElementById('bread_categ_link'),
            modelo: document.getElementById('bread_model')
        },
        imagens: {
            principais: document.getElementById('product-main-img'),
            thumbs: document.getElementById('product-imgs')
        },
        detalhes: {
            nome: document.getElementById('prod_nome'),
            nota: document.getElementById('prod_nota'),
            avaliacoes: document.getElementById('prod_nro_avaliacoes'),
            preco: document.getElementById('prod_preco'),
            precoBase: document.getElementById('prod_preco_base'),
            disp: document.getElementById('prod_disp'),
            qtd: document.getElementById('input_qtd'),
            cartBtn: document.getElementById('cart-btn')
        }
    }

    showProductInfo(placa, container)
}

const carregarFiltrosCategorias = (categorias) => {
    const checked = getLocalStorageItem('filtrosCats') || new Array()

    for (const categoria of categorias) {
        if (checked.indexOf(categoria.dataset.cat) != -1) {
            categoria.checked = true
        }
    }

    const allBoards = getLocalStorageItem('placas')
    const categories = categorias.map(function(input) {
        return parseInt(input.dataset.cat)
    })

    for (const category of categories) {
        let boardsOfCategory = allBoards.reduce(function(sum, board) {
            return board.categoria == category ? sum += 1 : sum
        }, 0)
        categorias[category - 1].parentElement.children[1].children[1].innerText = `(${boardsOfCategory})`
    }
}

const carregarFiltroMarcas = () => {
    const marcas = getLocalStorageItem('marcas').marcas
    const placas = getLocalStorageItem('placas')
    const container = document.getElementById('brand-filter')
    let checked = getLocalStorageItem('filtrosMarcas') || new Array()

    for (const marca of marcas) {
        let boardsOfBrand = placas.reduce(function(sum, board, i) {
            return board.fabricante == marca.nome ? sum += 1 : sum
        }, 0)
        container.innerHTML += `
        <div class="input-checkbox">
            <input type="checkbox" 
                id="brand-${marca.id}" 
                data-marca="${marca.nome}" 
                data-marcaid="${marca.id}"
                ${checked.find(checked => checked == marca.id) ? 'checked' : ''}>
            <label for="brand-${marca.id}">
                <span></span>
                ${marca.nome}
                <small>(${boardsOfBrand})</small>
            </label>
        </div>`
    }
}

const checkboxValueChange = (e, filtros) => {
    const allBoards = getLocalStorageItem('placas')
    let checkedBrands = filtros.checkboxes.inputs.filter(
        checkbox => checkbox.checked == true && checkbox.dataset.marca != undefined
    )

    let filterToSave = checkedBrands.map(function(brand) {
        return brand.dataset.marcaid
    })

    setLocalStorageItem('filtrosMarcas', filterToSave)

    let checkedCategories = filtros.checkboxes.inputs.filter(
        checkbox => checkbox.checked == true && checkbox.dataset.cat != undefined
    )

    filterToSave = checkedCategories.map(function(category) {
        return category.dataset.cat
    })

    setLocalStorageItem('filtrosCats', filterToSave)

    let filteredBoards = allBoards

    if (checkedBrands.length != 0) {
        filteredBoards = allBoards.filter(function(board) {
            for (const checkedBrand of checkedBrands) {
                if (board.fabricante == checkedBrand.dataset.marca)
                    return true
            }
        })
        let brandsIds = checkedBrands.map(function(brand) {
            return parseInt(brand.dataset.marcaid)
        })
    }

    if (checkedCategories.length != 0) {
        filteredBoards = filteredBoards.filter(function(board) {
            for (const checkedCategory of checkedCategories) {
                if (board.categoria == checkedCategory.dataset.cat)
                    return true
            }
        })
        let catIds = checkedCategories.map(function(category) {
            return parseInt(category.dataset.cat)
        })
    }

    if (checkedBrands.length + checkedCategories.length != 0) {
        mostrarResultadosCategorias(
            filteredBoards,
            document.getElementById('resultados')
        )
    }
}

const preencherFiltros = () => {
    let filtros = {
        checkboxes: {
            inputs: new Array(),
            spans: new Array()
        }
    }
    // em relacao as checkboxes das marcas
    const checkboxes = document.getElementsByClassName("input-checkbox")

    for (const checkbox of checkboxes) {
        let input = checkbox.children[0]

        input.addEventListener('change', function(e) {
            checkboxValueChange(e, filtros)
        })

        filtros.checkboxes.inputs.push(input)
        filtros.checkboxes.spans.push(checkbox.children[1].children[1])
    }

    return filtros
}

const carregarFiltros = () => {
    carregarFiltroMarcas()

    let filtros = preencherFiltros()

    carregarFiltrosCategorias(filtros.checkboxes.inputs.filter(input => input.dataset.cat != undefined))
}

const recortarResultados = (
        totalResult,
        currentPage = getParam('pg') || 1,
        countEachPage = window.RESULTS_PER_PAGE
    ) => {
    return totalResult.slice(countEachPage * (currentPage - 1), countEachPage * currentPage)
}

const mostrarResultadosCategorias = (itens, container) => {
    container.innerHTML = ``

    let partialResult = recortarResultados(itens)

    mostrarProdutos(partialResult, container,  `Resultado (${itens.length} placas)`)
    let botoes = criarPaginacao(itens)
    mostrarPaginacao(container, botoes)
}

const carregarCategorias = () => {
    carregarFiltros()

    let placasFiltradas = getLocalStorageItem('placas')
    const resultElem = document.getElementById('resultados')
    
    mostrarResultadosCategorias(placasFiltradas, resultElem)

    let evt = new Event('change')
    let marca1 = document.getElementById('brand-1')
    marca1.dispatchEvent(evt)
}

//Funções para manipulação de cookies



//Salvar Cookie

const setCookie = (
    name,
    value,
    path = window.location.pathname,
    maxAge = 60 * 60 * 24 * 3,
    domain = window.location.hostname
) => {
    
document.cookie = `${name}=${value};path=${path};domain=${domain};${maxAge != 0 ? `max-age=${maxAge}` : ''}`
}

const logoff = () => {
    removeCookie('UsuarioL')
    window.location.reload()
}

const removeCookie = (name = '') => {
    setCookie(name, '', '/', 60 * 60 * 24 * -3)
}

//Buscar todos os Cookies

const getAllCookies = () => {
let cookieString = document.cookie

if (cookieString == '') {
    return new Array()
}

let cookiesKeyValuePairs = cookieString.split('; ')

return cookiesKeyValuePairs.map(function(cookie) {
    let attr = cookie.split('=')
    return {
        name: attr[0],
        value: attr[1]
    }
})
}

//Buscar apenas um cookie

const getCookie = (name = '') => {
let cookies = getAllCookies()

for (const cookie of cookies) {
    if (cookie.name.toUpperCase() == name.toUpperCase()) {
        return cookie.value
    }
}

return null
}

//Verificar se um cookie existe

const hasCookie = (name = '') => {
let cookies = getAllCookies()

for (const cookie of cookies) {
    if (cookie.name.toUpperCase() == name.toUpperCase()) {
        return true
    }
}

return false
}

//JS dos forms Login e Cadastro de usuario
let padraoEmail = /^([\w-]+(\.[\w-]+)*)@(( [\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(\.[a-z]{2})?)$/i;

function verificarLogin(){
let fo = document.formularioLogin;
const usuarios = getLocalStorageItem('Usuarios');
//let data = new Date;
//data.setHours(data.getHours() + 1);
//console.log(data);
// dataLista = data.toString().split(" ");
//dia = dataLista.slice(0,1).toString();
// dataFinal = dataLista.splice(1,4).join(" ");

//console.log(dataLista);
//console.log(dia);
//console.log(dataFinal);


if(!usuarios){
    setInputMessage('Login inexistente!','Slogin');
    return false;
}else if(fo.emailLogin.value == '' || fo.senhaLogin.value == ''){
    setInputMessage(`Preencha os campos para o login`,'Slogin');
    return false;
}else{
    if(padraoEmail.test(fo.emailLogin.value)){
        if(usuarios.find(u => u.email === fo.emailLogin.value && u.senha === fo.senhaLogin.value) != null){
            const usuario = usuarios.find(u => u.email === fo.emailLogin.value && u.senha === fo.senhaLogin.value);
            if(hasCookie('UsuarioL')){
                return false;
            }else{
                setInputMessage(``,'Slogin');
                document.getElementById(`loginSucesso`).innerHTML = 'Login efetuado com sucesso';
                //document.cookie = "loginUsuario="+u.email+"; expires="+dia+", "+dataFinal+" UTC; path=/;";
                setCookie("UsuarioL",fo.emailLogin.value,'/');

                window.location.assign('index.php');
                
            }   
            
        }else{
            setInputMessage('Senha ou login incorretos!','Slogin');
        }
    }else{
        setInputMessage('Email inválido','Slogin');
    }
    
}



}
function setInputMessage(message, inputName) {
document.getElementById(`erro${inputName}`).innerHTML = `<span><h6 class="title">${message}</h6></span>`
}

function salvarUsuario(nome,email,senha){
const usuario = {nome, email, senha}
const usuarios = getLocalStorageItem('Usuarios')

if (!usuarios) {
    setLocalStorageItem('Usuarios', [])
    const usuarios = getLocalStorageItem('Usuarios')
    usuarios.push(usuario)
    setLocalStorageItem('Usuarios', usuarios)
    return 1
}else{
    usuarios.push(usuario)
    setLocalStorageItem('Usuarios', usuarios)
    return 1
}


}


//console.log(getLocalStorageItem('Usuarios'))

function verificarUsuarios(){
let formula = document.formulario;
const usuarios = getLocalStorageItem('Usuarios');

if (formula.firstName.value == '') {
    setInputMessage('Nome completo obrigatório', 'Nome');
    return false;
}else{
   
    document.getElementById(`erroNome`).innerHTML ='';
}

if (formula.email.value == '') {
    setInputMessage('Email obrigatório', 'Email');
    return false;
}else if(!padraoEmail.test(formula.email.value)){
    setInputMessage('Email inválido', 'Email');
    return false;
}else{
    if(!usuarios){
        document.getElementById(`erroEmail`).innerHTML ='';
    }else{
        if(usuarios.find(u => u.email == formula.email.value) != null){
            setInputMessage('Email já existente', 'Email');
            return false;
        }else{
            document.getElementById(`erroEmail`).innerHTML ='';
        }
    }
}

if (formula.senha.value == '') {
    setInputMessage('Senha obrigatória','Senha') ;
    return false;
}else{
    document.getElementById(`erroSenha`).innerHTML ='';
}

if(formula.Csenha.value == ''){
    setInputMessage('Confirme a senha','Csenha');
    return false;
}else{
    document.getElementById(`erroCsenha`).innerHTML ='';
}

if(formula.Csenha.value != formula.senha.value){
    setInputMessage('Senhas não conferem','Csenha');
    return false;
}else{
    document.getElementById(`erroCsenha`).innerHTML ='';
}

//console.log(formula.firstName.value);
//console.log(formula.email.value);
//console.log(formula.senha.value);
if(salvarUsuario(formula.firstName.value, formula.email.value, formula.senha.value)==1){
    document.getElementById(`cadastroSucesso`).innerHTML ='CADASTRO REALIZADO COM SUCESSO!';
    window.location.assign('formLogin.php');
}

}

const carregarFavoritos = () => {
    const favs = getLocalStorageItem('favoritos')
    const favsByUser = favs.filter(f => f.user == getCurrentUser())
    let placasFavoritas = new Array()
    for (const fav of favsByUser) {
        placasFavoritas.push(getPlacaById(fav.id))
    }
    const container = document.getElementById('placas-favoritas')
    if (placasFavoritas.length == 0) {
        container.innerText = 'Você não possui nenhum favorito!'
    } else {
        mostrarProdutos(placasFavoritas, container, '', 2)
    }
}