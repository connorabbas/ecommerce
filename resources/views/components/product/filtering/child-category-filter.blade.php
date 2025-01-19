@if ($category?->children->count())
    <ul class="list-group list-group-flush mt-2">
        @foreach ($category?->children as $child)
            <li class="list-group-item border-0">
                <div class="form-check">
                    <input
                        class="form-check-input"
                        type="radio"
                        value="{{ $child->id }}"
                        id="child-check-{{ $child->id }}"
                        name="categories[]"
                        {{-- TODO: Revisit checked later --}}
                        {{-- @checked(in_array((string) $child->id, request()->input('categories', []))) --}}
                        hx-get="{{ route('categories.children', ['collection' => $child->id]) }}"
                        hx-target="#child-categories-{{ $child->id }}"
                        hx-trigger="change"
                        hx-push-url="false"
                        hx-on::after-request="document.body.dispatchEvent(new Event('htmx-filtered'))"
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
