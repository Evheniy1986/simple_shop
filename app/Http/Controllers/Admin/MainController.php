<?php

namespace App\Http\Controllers\Admin;

class MainController
{
  public function __invoke()
  {
      return view('admin.main.index');
  }
}
