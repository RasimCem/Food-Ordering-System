<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\RestaurantOwner;
class CommentController extends Controller
{
    public function createMyComment($orderId, CommentRequest $request){
        $userId = Auth::user()->id;
        $user = Order::find($orderId);
        if( $userId == $user->user_id){
            if(Comment::where('user_id',$userId)->where('order_id',$orderId)->first() == null ){
                Comment::create([
                    "user_id"=>$userId,
                    "restaurant_id"=>$user->restaurant_id,
                    "order_id"=>$orderId,
                    "comment"=>$request->comment,
                    "point"=>$request->point
                ]);
                return response()->json("Comment Added",201);
            }else{
                return response()->json("You Commented For This Order Before!",404);
            }
        }else{
            return response()->json("This Order not belongs to you!!",401);
        }
    }

    public function showCommentsOfMyRestaurant(){
         $restaurantId = RestaurantOwner::where('user_id',Auth::user()->id)->first()->restaurant_id;
         $comments = Comment::get();
         $ownersComments = [];
        foreach($comments as $comment){
            $id =  $comment->order->restaurant_id;
            $comment->order->user;
            if($id == $restaurantId){
                array_push($ownersComments, $comment);
            }
        }
        return response()->json($ownersComments,201);
    }

    public function getAllComments(){
        $comments = Comment::all();
        foreach($comments as $comment){
            $comment->user;
            $comment->order->restaurant;
        }
        return response()->json($comments,200);
    }

    public function deleteComment($commentId){
        Comment::find($commentId)->delete();
        return response()->json('Comment Deleted',200);
    }

    public function getCommentsByRestaurantId($restaurantId){
        $comments = Comment::where('restaurant_id',$restaurantId)->get();
        foreach($comments as $comment){
            $comment->user;
        }
        return CommentResource::collection($comments);
    }

    public function getAveragePointByRestaurantId($restaurantId){
        return round(Comment::where('restaurant_id',$restaurantId)->avg('point'),1);
    }
}
