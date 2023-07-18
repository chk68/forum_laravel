@extends('layouts.site')

@section('content')
    <div class="main-body ">
       <div style="width: 70%" class="container py-4">
        <div class="row justify-content-md-center">
            <div class="col-md-offset-2 left-block">
                @foreach($channels as $channel)

                    <div data-id="{{ $channel->id }}" id="channel" class="card mb-3">
                        <div style="display: flex; justify-content:space-between">
                            <div class="card mb-3 left-block-channel-name">
                                <h3><i class="fa fa-envelope"></i>
                                    <a href="/threads/{{ $channel->slug }}" style="color: black">{{ $channel->name }}</a>
                                </h3>
                            </div>
                            @if(\Illuminate\Support\Facades\Auth::check())
                                @if (Auth::user()->role == "admin")
                                    <div class="card mb-3">
                                        <button class="delete-channel" data-id="{{ $channel->id }}" style="background: none; border: none;">
                                            <i class="fa fa-times-circle fa-2x" style="color: red;"></i>
                                        </button>
                                    </div>
                                @endif
                            @endif
                        </div>



                        @forelse($channel->threads->take(5) as $thread)
                            <div class ="left-main-thread">
         <div class="card-header left-main-thread-title">
             <div class="level">
                 <div class="flex lead">
                     <a class="text-decoration-none font-weight-bold" href="{{ $thread->path() }}">
                         @if (auth()->check())
                             @if ($thread->hasUpdatesFor(auth()->user()))
                                 <strong>
                                     {{ $thread->title }}
                                 </strong>
                             @else
                                 {{ $thread->title }}
                             @endif
                         @else
                             {{ $thread->title }}
                         @endif
                     </a>
                 </div>
                 <a class="text-decoration-none" href="{{ $thread->path() }}">
                     <i class="fa fa-commenting mr-1"></i> {{ $thread->replies_count }}
                 </a>

             </div>
         </div>
                                <div style="padding: 0; margin: 0; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; color: gray; font-size: smaller;" class="card-body left-main-thread-content">
                                    <div class="lead">
                                        <i class="fa fa-angle-double-up" style="margin-right: 5px;"></i>
                                        <span>
            {!! strlen(str_replace(['&nbsp;', '&mdash;'], ' ', strip_tags($thread->body))) > 200 ? substr(str_replace(['&nbsp;', '&mdash;'], ' ', strip_tags($thread->body)), 0, 200) . '...' : str_replace(['&nbsp;', '&mdash;'], ' ', strip_tags($thread->body)) !!}
        </span>
                                    </div>
                                </div>



                            </div>
                @empty
                    <p>Пока что здесь ничего нет.</p>
                @endforelse
                    </div>
                @endforeach

            </div>
        </div>
    </div>




       <div style="width: 30%" class="container py-4 main-right-body">
           <div class="row justify-content-md">
            <div class="col-md-8 col-md-offset-2">
                <div style="width: 400px;" class="card mb-3">
                    <div class="main-right-body-title">
                    <h5>Останні дії</h5>
                    </div>
                @foreach($users as $user)
                        @if (isset($user->reply))
                        <div class="main-right-body-all">
                            <div class="main-right-body-avatar" style="width: 50px; height: 50px; display: flex; justify-content: center;">
                                <div class="image-avatar" style="border-radius: 50%;">
                                    <img style="width: 100%; height:100%; vertical-align:top; object-fit: cover; border-radius: 50%;" id="avatar-preview" src="{{ asset('public/image/avatar/avatar'.$user->id.'.jpg') }}" alt="Avatar Preview">
                                </div>
                            </div>


                            <div style="width: 400px; margin-left: 10px;" class ="main-right-body-text">

                            <div class="card-body" style="padding: 0; margin: 0;">
                                    <a href="{{ route('user', $user->id) }}" class="body">{{ $user->name }} </a>
                                </div>

                                @if ($user->reply->body!="")
                                    <div class="card-body" style="padding: 0; margin: 0;">
                                        @php
                                            $body = strip_tags(html_entity_decode($user->reply->body));
                                            $limitedBody = strlen($body) > 200 ? substr($body, 0, 200):$body;

                                        @endphp
                                        {!! $limitedBody !!}
                                        <div class="main-right-body-data">
                                            {{ $user->reply->created_at }}
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
           <div class="row justify-content-md">
               <div class="col-md-8 col-md-offset-2">
                   <div style="width: 400px;"class="card mb-3">
                       <div class="main-right-bottom-title">
                     <h5>  Статистика форума</h5>
                       </div>
                   <div class="main-right-bottom">
                       <div style="display: flex; justify-content:space-between">
                           <div  class="card mb-3 main-right-bottom-threads">
                           Всього тем создано:
                           </div>
                           <div  class="card mb-3 main-right-bottom-threads-count">
                               {{count($threads)}}
                           </div>
                       </div>
                       <div style="display: flex; justify-content:space-between">
                           <div  class="card mb-3 main-right-bottom-reply">
                               Всього написано повідомлень:
                           </div>
                           <div  class="card mb-3 main-right-bottom-reply-count">
                               {{$count_replies}}
                           </div>
                       </div>
                   </div>
                   </div>
               </div>
           </div>


           <div class="row justify-content-md">
               <div class="col-md-8 col-md-offset-2">
                   <div style="width: 400px;" class="card mb-3">
                       <div class="main-right-bottom">
                           <?php
                           $images = array(
                               "https://www.plerdy.com/wp-content/uploads/2020/01/71.jpg",
                               "https://www.plerdy.com/wp-content/uploads/2020/01/59.jpg",
                               "https://www.plerdy.com/wp-content/uploads/2020/01/77.jpg",
                               "https://www.plerdy.com/wp-content/uploads/2020/01/97.jpg"
                           );
                           $randomImage = $images[array_rand($images)];
                           ?>
                           <a href="https://auto.ria.com/uk/">
                               <img src="<?php echo $randomImage; ?>" alt="Ad Banner" style="width: 100%; height: 100%; border-radius: 10px;">
                           </a>
                       </div>
                   </div>
               </div>
           </div>





       </div>

    </div>
@endsection

