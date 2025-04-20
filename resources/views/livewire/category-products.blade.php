<div>
      <div class="my-6">
            {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('category', $category) }}
      </div>

      <div class="flex gap-5 flex-wrap">
            @foreach ($this->products as $product)
                  <livewire:product-card :key="$product->id" :product="$product">
            @endforeach
      </div>
</div>
