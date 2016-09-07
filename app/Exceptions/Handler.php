<?php

namespace App\Exceptions;

use App\Http\Controllers\Client\CommonFunction;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Redirect;
use Session;
use DB;
use View;

class Handler extends ExceptionHandler
{
    use CommonFunction;
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
        ModelNotFoundException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            Session::flash('globalErrMsg','Sorry, the page you are looking for could not be found.');
            Session::flash('alert-class', 'alert-danger');

            $reviews = DB::table('customer_reviews AS cr')
                ->select('c.Name', 'cr.Review','c.UserImg')
                ->join('customers as c', 'c.ID', '=', 'cr.CustomerID')
                ->get();

            $data = array(
                'products' => array(),
                'reviews' => $reviews
            );

            $itemSelected = $this->getCartData();
            $ShareData = array(
                'itemSelected' => $itemSelected
            );
            View::share('ShareData', $ShareData);
            return response(view('client.home',$data), 404);
        }

        return parent::render($request, $e);

        /*if ($e instanceof ModelNotFoundException) {
            $e = new NotFoundHttpException($e->getMessage(), $e);
        }

        return parent::render($request, $e);*/
    }
}
