<div>
    <div class="my-6">
          {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('categories') }}
    </div>

    <div class="flex gap-5 flex-wrap">
          @foreach ($this->categories as $category)
                <x-category-card :category="$category" />
          @endforeach
    </div>
</div>
