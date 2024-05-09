<?php

namespace App\Http\Controllers;

class MainController
{
  public function __invoke()
  {
      return view('admin.main.index');
  }
}
