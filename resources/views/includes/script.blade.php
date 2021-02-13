<!-- Bootstrap core JavaScript-->

{{-- <script src="/vendor/jquery/jquery.min.js"></script> --}}
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> --}}

<script src="/vendor/jquery/jquery-3.5.1.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/js/main.min.js"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script>
    @if(Session::has('sukses'))
        Vue.use(Toasted);
        var toastvue = new Vue({
            el: "#toastvue",
            mounted() {
                AOS.init();
                this.$toasted.success(
                    "{{ Session::get('sukses') }}",
                    {
                        position: "top-center",
                        className: "rounded",
                        duration: 2000,
                    }
                );
            },
        });
    @elseif(Session::has('gagal'))
        Vue.use(Toasted);
        var toastvue = new Vue({
            el: "#toastvue",
            mounted() {
                AOS.init();
                this.$toasted.error(
                    "{{ Session::get('gagal') }}",
                    {
                        position: "top-center",
                        className: "rounded",
                        duration: 2000,
                    }
                );
            },
        });
    @endif
</script>