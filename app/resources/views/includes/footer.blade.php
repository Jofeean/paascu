<div class="parallax-pro">
    <div class="img-src" style="background-image: url('{{ url('assets/img/footers/'.$footerImage->filename) }}');">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="fr-view">
                    {!! $footerContent->content !!}
                </div>
            </div>
        </div>
        <div class="space-30"></div>
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="credits">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    PAASCU Philippines, made by FEU - Institute of Technology
                </div>
            </div>
        </div>
    </div>

</div>
