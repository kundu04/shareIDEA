<!-- Main Nav -->
<div id="nav-fixed">
					<div class="container">
						<!-- logo -->
						<div class="nav-logo">
							<a href="index.html" class="logo"><img src="{{asset('assets/frontend/img/logo.png')}}" alt=""></a>
						</div>
						<!-- /logo -->

						<!-- nav -->
						<ul class="nav-menu nav navbar-nav">
							<li><a href="{{route('home')}}">Story</a></li>
                            @guest()
							<li class="cat-1"><a href="{{route('register')}}">Create an account</a></li>
							<li class="cat-2"><a href="{{route('login')}}">Login</a></li>
                            @endguest
                            
                            @auth()
                            <?php $user_id = auth()->user()->id; ?>
                            <li><form action="{{route('post.create')}}" method='get'>@csrf
                                <input type="hidden" name='user_id' value='{{$user_id}}'>
                                <button style= height:70px; type="submit" class="btn btn-block btn-success">
                                    Write a Story
                                </button>
                            </form></li>
                            <li><a href="{{route('profile',$user_id)}}" class="text-white">My Profile</a></li>
                            <li><a href="{{route('logout')}}" class="text-white">Logout</a></li>
                            
                            @endauth
							<!-- <li class="cat-3"><a href="category.html">Css</a></li>
							<li class="cat-4"><a href="category.html">Jquery</a></li> -->
						</ul>
						<!-- /nav -->

					</div>
				</div>
				<!-- /Main Nav -->

				