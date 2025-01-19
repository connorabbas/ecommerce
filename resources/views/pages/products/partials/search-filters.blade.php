<div id="search-filters-container">
    <form
        id="filters-form"
        hx-get="{{ url()->current() }}"
        hx-target="#product-results-container"
        hx-push-url="true"
        hx-include="[name='categories[]']"
        hx-trigger="htmx-filtered from:body"
    >
        <div
            class="accordion shadow-sm"
            id="accordionExample"
        >
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button
                        class="accordion-button"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#categoryFilters"
                        aria-expanded="true"
                        aria-controls="categoryFilters"
                    >
                        Categories
                    </button>
                </h2>
                <div
                    id="categoryFilters"
                    class="accordion-collapse collapse show"
                    data-bs-parent="#accordionExample"
                >
                    <div class="accordion-body p-0">
                        <div class="d-flex flex-column gap-3">
                            <div>
                                <ul class="list-group list-group-flush rounded">
                                    @foreach ($collections as $collection)
                                        <li class="list-group-item">
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input"
                                                    type="radio"
                                                    value="{{ $collection->id }}"
                                                    id="collection-check-{{ $collection->id }}"
                                                    name="categories[]"
                                                    {{-- TODO: Revisit checked later --}}
                                                    {{-- @checked(in_array((string) $collection->id, request()->input('categories', []))) --}}
                                                    hx-get="{{ route('categories.children', ['collection' => $collection->id]) }}"
                                                    hx-target="#child-categories-{{ $collection->id }}"
                                                    hx-trigger="change"
                                                    hx-push-url="false"
                                                    hx-on::after-request="document.body.dispatchEvent(new Event('htmx-filtered'))"
                                                >
                                                <label
                                                    class="form-check-label"
                                                    for="collection-check-{{ $collection->id }}"
                                                >
                                                    {{ $collection->translateAttribute('name') }}
                                                </label>
                                            </div>
                                            <div id="child-categories-{{ $collection->id }}"></div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <noscript>
                                <div class="p-3 pt-0">
                                    <button
                                        class="btn btn-secondary btn-sm"
                                        type="submit"
                                    >
                                        Apply
                                    </button>
                                </div>
                            </noscript>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
