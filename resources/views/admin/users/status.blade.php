@if($user->is_active)
    <span class="badge rounded-pill badge-light-success me-1">{{ $user->status_name }}</span>
@elseif($user->is_blocked)
    <span class="badge rounded-pill badge-light-danger me-1">{{ $user->status_name }}</span>
@else
    <span class="badge rounded-pill badge-light-primary me-1">{{ $user->status_name }}</span>
@endif
