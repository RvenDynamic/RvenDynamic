<?php namespace App\Filters;
 
use \CodeIgniter\HTTP\RequestInterface;
use \CodeIgniter\HTTP\ResponseInterface;
use \CodeIgniter\Filters\FilterInterface;
 
class Auth_Admin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // jika user belum login
        if(session()->get('level') == ""){
            // maka redirct ke halaman login
           
            return redirect()->to('/login'); 
        }
    }
 
    //--------------------------------------------------------------------
 
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        if(session()->get('level') == "admin"){
            // maka redirct ke halaman login
           
            return redirect()->to('/admin'); 
        }
        
    }
}