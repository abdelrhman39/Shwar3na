

                <div class="reviews-comments-wrap" style="width: 100%">
                    @foreach($comments as $comment)
                        <!-- reviews-comments-item -->
                        <div class="reviews-comments-item">
                            <div class="review-comments-avatar">

                                @foreach ($users as $user )
                                    @if ($user->id == $comment->user_id)
                                        <img src="{{ url('uploads/users/'.$user->image) }}" alt="">
                                    @endif
                                @endforeach
                            </div>
                            <div class="reviews-comments-item-text">
                                <h4><a href="#">{{ $comment->user->name }}</a></h4>
                                <div class="listing-rating card-popup-rainingvis"
                                    data-starrating2="{{ $comment->rating }}"> </div>
                                <div class="clearfix"></div>
                                <p>" {{ $comment->comment }} . "</p>
                                <span class="reviews-comments-item-date"><i
                                        class="fa fa-calendar-check-o"></i>{{ $comment->created_at }}</span>
                            </div>
                            {{-- Start reply.add --}}
                            @if (Auth::user())

                                <a href="" id="reply"></a>
                                <form method="post" action="{{ route('reply.add') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="comment" class="form-control" />
                                        <input type="hidden" name="place_id" value="{{ $place_id }}" />
                                        <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" style="cursor: pointer" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;">Reply</button>
                                    </div>
                                </form>

                            @endif
                            @include('website.places.comments', ['comments' => $comment->replies])
                            {{-- End reply.add --}}
                        </div>
                        <!--reviews-comments-item end-->
                    @endforeach

                </div>



