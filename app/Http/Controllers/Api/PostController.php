<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Blog;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * PostController
     *
     * @param  \App\Services\PostService  $postService
     */
    public function __construct(private readonly PostService $postService)
    {
        $this->authorizeResource(Post::class, 'post', [
            'except' => ['create', 'store'],
        ]);

        $this->middleware('can:create,App\Models\Post,blog')
            ->only(['create', 'store']);

        $this->middleware('cache.headers:public;max_age=2628000;etag');
    }

    /**
     * 글 목록
     *
     * @return \App\Http\Resources\PostCollection
     */
    public function index(Blog $blog): PostCollection
    {
        $posts = $blog->posts()
           ->latest()
           ->get();
        //->paginate(5);

        //return $posts;
        return new PostCollection($posts);
    }

    /**
     * 글 쓰기
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(StorePostRequest $request, Blog $blog): \Symfony\Component\HttpFoundation\Response
    {
        $post = $this->postService->store($request->validated(), $blog);

        return (new PostResource($post))
                ->response()
                ->setStatusCode(201);
    }

    /**
     * 글 읽기
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \App\Http\Resources\PostResource
     */
    public function show(Request $request, Post $post): PostResource
    {
        return new PostResource($post);
    }

    /**
     * 글 수정
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post): Response
    {
        $this->postService->update($request->validated(), $post);

        return response()->noContent();
    }

    /**
     * 글 삭제
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post): Response
    {
        $this->postService->destroy($post);

        return response()->noContent();
    }
}
