<?php
 
namespace App\Http\Middleware;
 
use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
 
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    if (!$request->user()) {
        return redirect()->route('login');
    }

    $role_id = $request->user()->role_id;

    $admin_role = Role::where('name', 'Admin')->first();

    if (!$admin_role || $role_id != $admin_role->id) {
        abort(403, 'Anda tidak bisa akses halaman admin');
    }

    return $next($request);
}
}