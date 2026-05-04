<?php
// app/controllers/Promo.php

class Promo extends Controller {
    public function index() {
        $data['judul'] = 'Special Promotions';
        $data['promo'] = $this->model('Promo_model')->getAllPromo();
        $this->view('promo/index', $data);
    }
}
