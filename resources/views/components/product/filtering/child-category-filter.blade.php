@if ($category?->children->count())
    <ul class="list-group list-group-flush mt-2">
        @foreach ($category?->children as $child)
            <li class="list-group-item border-0">
                <div class="form-check">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        value="{{ $child->id }}"
                        id="child-check-{{ $child->id }}"
                        name="categories[]"
                        @checked(in_array($child->id, request()->input('categories', [])))
                        hx-get="{{ route('categories.children', ['collection' => $child->id]) }}"
                        hx-target="#child-categories-{{ $child->id }}"
                        hx-trigger="change"
                        hx-push-url="false"
                    >
                    <label
                        class="form-check-label"
                        for="child-check-{{ $child->id }}"
                    >
                        {{ $child->translateAttribute('name') }}
                    </label>
                </div>
                <div id="child-categories-{{ $child->id }}"></div>
            </li>
        @endforeach
    </ul>
@endif
