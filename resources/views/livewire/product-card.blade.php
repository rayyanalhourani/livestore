<div class="w-[270px] h-[350px]">
      <div class="h-[250px] w-full bg-gray-200 relative">
            <div class="absolute top-2 left-2 bg-red-500 text-white px-2 py-1 rounded">
                  -40%
            </div>
            <div class="absolute top-1 right-1 rounded-full bg-white p-1">
                  <svg fill="#000000" width="30px" height="30px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                        stroke="#000000" stroke-width="0.00024000000000000003">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                              <path
                                    d="M20.5,4.609A5.811,5.811,0,0,0,16,2.5a5.75,5.75,0,0,0-4,1.455A5.75,5.75,0,0,0,8,2.5,5.811,5.811,0,0,0,3.5,4.609c-.953,1.156-1.95,3.249-1.289,6.66,1.055,5.447,8.966,9.917,9.3,10.1a1,1,0,0,0,.974,0c.336-.187,8.247-4.657,9.3-10.1C22.45,7.858,21.453,5.765,20.5,4.609Zm-.674,6.28C19.08,14.74,13.658,18.322,12,19.34c-2.336-1.41-7.142-4.95-7.821-8.451-.513-2.646.189-4.183.869-5.007A3.819,3.819,0,0,1,8,4.5a3.493,3.493,0,0,1,3.115,1.469,1.005,1.005,0,0,0,1.76.011A3.489,3.489,0,0,1,16,4.5a3.819,3.819,0,0,1,2.959,1.382C19.637,6.706,20.339,8.243,19.826,10.889Z">
                              </path>
                        </g>
                  </svg>
            </div>
      </div>
      <div class="mt-4 font-medium">
            <h1>{{ $product->name }}</h1>
            <div class="flex gap-3">
                  <h1 class="font-medium text-red-500">{{ $product->price }}</h1>
                  <h1 class="line-through text-gray-500">350$</h1>
            </div>

            <div>{{ $rating = rand(1, 5) }}
                  @foreach (range(1, 5) as $i)
                        <span class="fa fa-star checked"></span>
                  @endforeach
            </div>

      </div>
</div>
