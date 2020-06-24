<div class="col-lg-3 sub-menu">
	<ul class="list-group">
	  <li class="{{request()->routeIs('senseihome') ? 'active' : '' }} list-group-item  d-flex justify-content-between align-items-center">
	    <a href="{{ route('senseihome') }}"><span><i class="fas fa-tv"></i></span>Dashboard</a>
	  </li>
	  <li class="list-group-item  d-flex justify-content-between align-items-center">
	    <a href="#"><span><i class="fas fa-clipboard-check"></i></span>Test</a>
	  </li>
	  <li class="{{request()->routeIs('vocab*') ? 'active' : '' }} list-group-item  d-flex justify-content-between align-items-center">
	    <a href="{{ route('vocab.index') }}"><span><i class="fas fa-clipboard-list"></i></span>Vocabulary</a>
	  </li>
	  <li class="list-group-item  d-flex justify-content-between align-items-center">
	    <a href="{{ route('grammar.index') }}"><span><i class="fas fa-spell-check"></i></span>Grammar</a>
	  </li>
	  <li class="{{request()->routeIs('kanji*') ? 'active' : '' }} list-group-item  d-flex justify-content-between align-items-center">
	    <a href="{{ route('kanji.index') }}"><span><i class="far fa-bookmark"></i></span>Kanji</a>
	  </li>
	  <li class="list-group-item  d-flex justify-content-between align-items-center">
	    <a href="#"><span><i class="fas fa-book-open"></i></span>Reading</a>
	  </li>
	  <li class="list-group-item  d-flex justify-content-between align-items-center">
	    <a href="#"><span><i class="fas fa-headphones-alt"></i></span>Listening</a>
	  </li>
	  <li class="{{request()->routeIs('writing*') ? 'active' : '' }} list-group-item  d-flex justify-content-between align-items-center">
	    <a href="{{ route('writing.index') }}"><span><i class="fas fa-pen-alt"></i></span>Writing</a>
	  </li>
	  <li class="list-group-item  d-flex justify-content-between align-items-center">
	    <a href="{{ route('showallstudents') }}"><span><i class="fas fa-user-friends"></i></span>Student</a>
	  </li>
	  <li class="list-group-item  d-flex justify-content-between align-items-center">
	    <a href="#"><span><i class="fas fa-chalkboard-teacher"></i></span>Teacher</a>
	  </li>
	</ul>
	<hr class="dropdown-divider">
</div>