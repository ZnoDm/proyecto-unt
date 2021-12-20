<x-app-layout>
  @section('title', 'FAQ')
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="font-bold text-3xl mt-7 text-gray-800">FAQ - <span style="color:#E6AD09">Pregutas Frecuentes</span></h1>
    <div class="mb-5" style="border-color: #E6AD09; border-bottom-style: solid; border-bottom-width: 3px; width: 40px; "></div>

    <div class="">
      <img src="{{asset('img/promocion_faq.jpg')}}" alt="" class="object-cover h-96 w-full">
    </div>    
    <div class="col-span-3 justify-center items-start mt-4 mb-5">
          <div class="max-w-7xl mx-auto">
            
            <ul class="flex flex-col">
              <li class="bg-white my-2 shadow-lg rounded-xl" x-data="accordion(1)">
                <h2
                  @click="handleClick()"
                  class="flex flex-row justify-between items-center font-semibold p-3 rounded-xl cursor-pointer bg-blue-900"
                >
                  <span class="text-white"><b>¿Quiénes somos?</b></span>
                  <svg
                    :class="handleRotate()"
                    class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                    viewBox="0 0 20 20"
                  >
                    <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                  </svg>
                </h2>
                <div
                  x-ref="tab"
                  :style="handleToggle()"
                  class="border-black-600 overflow-hidden max-h-0 duration-500 transition-all"
                >
                  <p class="p-3 text-gray-900">
                    "Somos la Universidad Nacional de Trujillo con 197 años de fundación y 190 años años de instalación, por medio de esta página web queremos reflejar lo que podemos lograr juntos y lo lejos que podemos llegar, si nos proponemos objetivos ambiciosos, nos ponemos a trabajar y lo cumplimos"
                  </p>
                </div>
              </li>
              <li class="bg-white my-2 shadow-lg rounded-xl" x-data="accordion(2)">
                <h2
                  @click="handleClick()"
                  class="flex flex-row justify-between items-center font-semibold p-3 rounded-xl cursor-pointer bg-blue-900"
                >
                  <span class="text-white"><b>¿Cuál es la misión?</b></span>
                  <svg
                    :class="handleRotate()"
                    class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                    viewBox="0 0 20 20"
                  >
                    <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                  </svg>
                </h2>
                <div
                  class=" border-black-600 overflow-hidden max-h-0 duration-500 transition-all"
                  x-ref="tab"
                  :style="handleToggle()"
                >
                  <p class="p-3 text-gray-900">
                    “Formar profesionales e investigadores de la región norte y el país, con ética y calidad; creadores de conocimiento científico, tecnológico, humanístico e innovación, para el desarrollo sostenible de la sociedad".
                  </p>
                </div>
              </li>
              <li class="bg-white my-2 shadow-lg rounded-xl" x-data="accordion(3)">
                <h2
                  @click="handleClick()"
                  class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer rounded-xl bg-blue-900"
                >
                  <span class="text-white"><b>¿Cuál es la visión?</b></span>
                  <svg
                    :class="handleRotate()"
                    class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                    viewBox="0 0 20 20"
                  >
                    <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                  </svg>
                </h2>
                <div
                  class=" border-black-600 overflow-hidden max-h-0 duration-500 transition-all"
                  x-ref="tab"
                  :style="handleToggle()"
                >
                  <p class="p-3 text-gray-900">
                    “Al 2024, la Universidad Nacional de Trujillo es una de las líderes en excelencia académica y producción científica con visibilidad e impacto  en Latinoamérica y el mundo”
                  </p>
                </div>
              </li>
              <li class="bg-white my-2 shadow-lg rounded-xl" x-data="accordion(4)">
                <h2
                  @click="handleClick()"
                  class="flex flex-row justify-between items-center rounded-xl border-black-600 font-semibold p-3 cursor-pointer bg-blue-900"
                >
                  <span class="text-white"><b>¿Cuáles son los valores?</b></span>
                  <svg
                    :class="handleRotate()"
                    class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                    viewBox="0 0 20 20"
                  >
                    <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                  </svg>
                </h2>
                <div
                  class="border-black-600 overflow-hidden max-h-0 duration-500 transition-all"
                  x-ref="tab"
                  :style="handleToggle()"
                >
                  <p class="p-3 text-gray-900">
                    Verdad <br>
                    Justicia <br>
                    Respeto <br>
                    Honradez <br>
                  </p>
                </div>
              </li>
              
            </ul>
          </div>
      </div>
      
    </div>
  @push('scripts')
    <script>
      document.addEventListener('alpine:init', () => {
        Alpine.store('accordion', {
          tab: 0
        });
        
        Alpine.data('accordion', (idx) => ({
          init() {
            this.idx = idx;
          },
          idx: -1,
          handleClick() {
            this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
          },
          handleRotate() {
            return this.$store.accordion.tab === this.idx ? 'rotate-180' : '';
          },
          handleToggle() {
            return this.$store.accordion.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
          }
        }));
      })
    </script>
  @endpush
</x-app-layout>