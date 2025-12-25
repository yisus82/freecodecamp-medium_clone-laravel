@props(['user'])

<div {{ $attributes }} x-data="{
    following: {{ $user->isFollowedBy(auth()->user()) ? 'true' : 'false' }},
    followersCount: {{ $user->followers()->count() }},
    follow() {
        axios.post('{{ route('follow', $user->username) }}')
            .then(res => {
                this.following = !this.following
                this.followersCount = res.data.followersCount
            })
            .catch(err => {
                console.log(err)
            })
    },
}" class="w-64 flex-shrink-0 p-4">
    {{ $slot }}
</div>