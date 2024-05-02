<x-layout>
    <div class="container container--narrow">
        <style>
            .btn-primary-gradient {
                background: linear-gradient(to right, #ff416c, #ff4b2b);
                /* Gradient background */
                border: none;
                color: white;
                animation: pulse-glow 2s infinite;
                /* Apply animation */
                padding: 15px 30px;
                /* Increase padding for larger button */
                display: block;
                /* Make the button a block element */
                margin: 0 auto;
                /* Center the button horizontally */
                text-align: center;
                /* Center text inside the button */
                font-size: 18px;
                /* Increase font size */
            }

            .btn-primary-gradient:hover {
                transform: translateY(-2px);
                /* Move up slightly on hover */
            }

            .download-text {
                margin-right: 10px;
            }
        </style>
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>Payment successful!</strong> Your invoice has been generated.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="mt-3">
                <a href="{{ url('pdf/' . $pdfFileName) }}" class="btn btn-lg btn-primary-gradient">
                    <span class="download-text">Download PDF Invoice</span>
                    <i class="fas fa-download"></i>
                </a>
            </div>
        </div>
    </div>


</x-layout>
