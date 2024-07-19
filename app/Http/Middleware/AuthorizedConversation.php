<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class AuthorizedConversation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Assuming you want to compare the authenticated user's ID with a user ID passed in the request
        // For example, you might pass 'user_id' in the request
        $userId = $request->input('user_id');
        if (auth()->check() && (auth()->user()->id === (int) $userId)) {
            return $next($request);
        }
        return new JsonResponse(['message' => 'Not authorized'], 401);
    }

}
