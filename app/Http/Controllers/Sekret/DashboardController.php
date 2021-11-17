<?php
namespace App\Http\Controllers\Sekret;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller {
  public function __construct() {
    $this->middleware('auth');
  }
  public function index() {
    return view('sekret.dashboard');
  }
  public function new() {
    return view('sekret.new-meeting');
  }
  public function new2() {
    return view('sekret.new-meeting-2');
  }
}