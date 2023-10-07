<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Datatable extends Component {
    
    public $title;
    public $crud; //titulo do crud
    public $header; //array de colunas da tabela
    public $data; 
    public $hide; //esconde componentes (true ou false)

    public function __construct($title, $crud, $header, $data, $hide) {

        $this->title = $title;   
        $this->crud = $crud;
        $this->header = $header;
        $this->data = $data;
        $this->hide = $hide;
    }

    public function render() {
        return view('components.datatable');
    }
}
