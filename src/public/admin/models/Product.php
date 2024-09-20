<?php
    class Product {
        public $modelo;
        public $categoria;
        public $preco_base;
        public $desconto;
        public $fabricante;
        public $imagens;
        public $descricao;
        public $estoque;
        public $novo;
        
        public function __construct($modelo,
            $categoria,
            $preco_base,
            $desconto,
            $fabricante,
            $imagens,
            $descricao,
            $estoque,
            $novo)
        {
            $this->modelo = $modelo;
            $this->categoria = $categoria;
            $this-> preco_base = $preco_base;
            $this->desconto = $desconto;
            $this->fabricante = $fabricante;
            $this->imagens = $imagens;
            $this->descricao = $descricao;
            $this->estoque = $estoque;
            $this->novo = $novo;
        }
    }
?>