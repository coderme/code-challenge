<?php

namespace App\Http\Contracts;

interface Detailable {
    /**
     * View the details for an object
     *
     * @return void
     */
    public function details(string $id);
    
}