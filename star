 .rating-stars {
                                display: block;
                                width: 65vmin;
                                padding: 3vmin;
                                border-radius: 5vmin;
                                position: relative;
                                display: flex;
                                justify-content: center;
                                transform: rotateX(15deg);
                            }

                            input {
                                display: none;
                            }

                            label {
                                width: 10vmin;
                                height: 10vmin;
                                cursor: pointer;
                                margin: 0.5vmin 1.5vmin;
                                transition: var(--tran);
                                transition-delay: 0s;
                                position: relative;
                            }

                            label:before {
                                position: absolute;
                                width: 100%;
                                height: 100%;
                                content: "\2605";
                                z-index: 2;
                                font-size: 11vmin;
                                line-height: 11vmin;
                                color: #e1da1d;
                                text-align: center;
                                transform: translateY(0vmin);
                                transition: var(--tran);
                                text-shadow:
                                    1px 1px 1px var(#e1da1d),
                                    -1px -1px 1px var(#e1da1d),
                                    -1px 0px 1px var(#e1da1d),
                                    1px 0px 1px var(#e1da1d),
                                    0vmin 0.1vmin 1px  #e1da1d,
                                    0vmin 0.1vmin 1px  #e1da1d,
                                    0vmin 0.2vmin 1px  #e1da1d,
                                    0vmin 0.2vmin 1px  #e1da1d,
                                    0vmin 0.3vmin 1px  #e1da1d,
                                    0vmin 0.3vmin 1px  #e1da1d,
                                    0vmin 0.4vmin 1px  #e1da1d,
                                    0vmin 0.4vmin 1px  #e1da1d,
                                    0vmin 0.5vmin 1px  #e1da1d,
                                    0vmin 0.5vmin 1px  #e1da1d,
                                    0vmin 0.6vmin 1px  #e1da1d,
                                    0vmin 0.6vmin 1px  #e1da1d,
                                    0vmin 0.7vmin 1px  #e1da1d,
                                    0vmin 0.7vmin 1px  #e1da1d,
                                    0vmin 0.8vmin 1px  #e1da1d,
                                    0vmin 0.8vmin 1px  #e1da1d,
                                    0vmin 0.9vmin 1px  #e1da1d,
                                    0vmin 0.9vmin 1px  #e1da1d,
                                    0vmin 1.0vmin 1px  #e1da1d,
                                    0vmin 1.1vmin 1px  #e1da1d,
                                    0vmin 1.1vmin 1px  #e1da1d,
                                    0vmin 1.2vmin 1px  #e1da1d,
                                    0vmin 1.2vmin 1px  #e1da1d,
                                    0vmin 1.3vmin 1px  #e1da1d,
                                    0vmin 1.3vmin 1px  #e1da1d,
                                    0vmin 1.4vmin 1px  #e1da1d,
                                    0vmin 1.4vmin 1px  #e1da1d,
                                    0vmin 1.5vmin 1px  #e1da1d,
                                    0vmin 1.5vmin 1px  #e1da1d,
                                    0vmin 1.6vmin 1px  #e1da1d,
                                    0vmin 1.6vmin 3px #e1da1d;
                                filter: drop-shadow(0px 5px 10px #e1da1d) drop-shadow(0px 5px 30px #e1da1d);
                            }

                            label:hover:before {
                                color: #e1da1d;
                                filter: drop-shadow(0px 5px 15px #e1da1d) drop-shadow(0px 5px 30px #e1da1d);
                            }




                            /*** unchecked:before ***/
                            input:checked+label~label:before,
                            input:checked+label~label:hover:active:before {
                                transition: var(--tran);
                                color: #e1da1d;
                                color: #e1da1d;
                                transform: translateY(1.5vmin);
                                filter: none;
                                text-shadow:
                                    1px 1px 1px var(#e1da1d),
                                    -1px -1px 1px var(#e1da1d),
                                    -1px 0px 1px var(#e1da1d),
                                    1px 0px 1px var(#e1da1d),
                                    0vmin 0.01vmin 1px  #e1da1d,
                                    0vmin 0.02vmin 1px  #e1da1d,
                                    0vmin 0.03vmin 1px  #e1da1d,
                                    0vmin 0.04vmin 1px  #e1da1d,
                                    0vmin 0.05vmin 1px  #e1da1d,
                                    0vmin 0.06vmin 1px  #e1da1d,
                                    0vmin 0.07vmin 1px  #e1da1d,
                                    0vmin 0.08vmin 1px  #e1da1d,
                                    0vmin 0.09vmin 1px  #e1da1d,
                                    0vmin 0.10vmin 1px  #e1da1d,
                                    0vmin 0.11vmin 1px  #e1da1d,
                                    0vmin 0.12vmin 1px  #e1da1d,
                                    0vmin 0.13vmin 1px  #e1da1d,
                                    0vmin 0.14vmin 1px  #e1da1d,
                                    0vmin 0.15vmin 1px  #e1da1d,
                                    0vmin 0.16vmin 1px  #e1da1d,
                                    0vmin 0.17vmin 1px  #e1da1d,
                                    0vmin 0.18vmin 1px  #e1da1d,
                                    0vmin 0.19vmin 1px  #e1da1d,
                                    0vmin 0.20vmin 1px  #e1da1d,
                                    0vmin 0.21vmin 1px  #e1da1d,
                                    0vmin 0.22vmin 1px  #e1da1d,
                                    0vmin 0.23vmin 1px  #e1da1d,
                                    0vmin 0.24vmin 1px  #e1da1d,
                                    0vmin 0.25vmin 1px  #e1da1d,
                                    0vmin 0.26vmin 1px  #e1da1d,
                                    0vmin 0.27vmin 1px  #e1da1d,
                                    0vmin 0.28vmin 1px  #e1da1d,
                                    0vmin 0.29vmin 1px  #e1da1d,
                                    0vmin 0.3vmin 1px  #e1da1d,
                                    0vmin 0.5vmin 3px #e1da1d;
                            }



                            /*** unchecked:hover:before ***/
                            input:checked+label~label:hover:before,
                            label~label:hover:active:before {
                                color: #e1da1d;
                                transform: translateY(1vmin);
                                text-shadow:
                                    1px 1px 1px var(#e1da1d),
                                    -1px -1px 1px var(#e1da1d),
                                    -1px 0px 1px var(#e1da1d),
                                    1px 0px 1px var(#e1da1d),
                                    0vmin 0.02vmin 1px  #e1da1d,
                                    0vmin 0.04vmin 1px  #e1da1d,
                                    0vmin 0.06vmin 1px  #e1da1d,
                                    0vmin 0.08vmin 1px  #e1da1d,
                                    0vmin 0.10vmin 1px  #e1da1d,
                                    0vmin 0.12vmin 1px  #e1da1d,
                                    0vmin 0.14vmin 1px  #e1da1d,
                                    0vmin 0.16vmin 1px  #e1da1d,
                                    0vmin 0.18vmin 1px  #e1da1d,
                                    0vmin 0.20vmin 1px  #e1da1d,
                                    0vmin 0.22vmin 1px  #e1da1d,
                                    0vmin 0.24vmin 1px  #e1da1d,
                                    0vmin 0.26vmin 1px  #e1da1d,
                                    0vmin 0.28vmin 1px  #e1da1d,
                                    0vmin 0.30vmin 1px  #e1da1d,
                                    0vmin 0.32vmin 1px  #e1da1d,
                                    0vmin 0.34vmin 1px  #e1da1d,
                                    0vmin 0.36vmin 1px  #e1da1d,
                                    0vmin 0.38vmin 1px  #e1da1d,
                                    0vmin 0.40vmin 1px  #e1da1d,
                                    0vmin 0.42vmin 1px  #e1da1d,
                                    0vmin 0.44vmin 1px  #e1da1d,
                                    0vmin 0.46vmin 1px  #e1da1d,
                                    0vmin 0.48vmin 1px  #e1da1d,
                                    0vmin 0.50vmin 1px  #e1da1d,
                                    0vmin 0.52vmin 1px  #e1da1d,
                                    0vmin 0.54vmin 1px  #e1da1d,
                                    0vmin 0.56vmin 1px  #e1da1d,
                                    0vmin 0.58vmin 1px  #e1da1d,
                                    0vmin 0.60vmin 1px  #e1da1d,
                                    0vmin 1vmin 3px #e1da1d;
                            }


                            label[for=rs1]:before {
                                transition-delay: 0.05s;
                            }

                            label[for=rs2]:before {
                                transition-delay: 0.1s;
                            }

                            label[for=rs3]:before {
                                transition-delay: 0.15s;
                            }

                            label[for=rs4]:before {
                                transition-delay: 0.2s;
                            }

                            label[for=rs5]:before {
                                transition-delay: 0.25s;
                            }




                            /*** Reload ***/
                            label[for=rs0] {
                                position: absolute;
                                top: 20vmin;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                            }

                            label[for=rs0]:before {
                                --ar: #e1da1d;
                                content: "";
                                position: absolute;
                                width: 12vmin;
                                height: 12vmin;
                                border-radius: 100%;
                                transform: rotate(0deg);
                                /* background:
                                    radial-gradient(circle at 50% 135%, #fff0 40%, var(--ar) calc(40% + 1px) 45%, #fff0 calc(45% + 1px) 100%),
                                    radial-gradient(circle at 50% -35%, #fff0 40%, var(--ar) calc(40% + 1px) 45%, #fff0 calc(45% + 1px) 100%),
                                    conic-gradient(from -45deg at 50% 60%, var(--ar) 0 25%, #fff0 0 100%),
                                    conic-gradient(from 135deg at 50% 40%, var(--ar) 0 25%, #fff0 0 100%); */
                                background-size: 100% 20%, 100% 20%, 1.5vmin 1.5vmin, 1.5vmin 1.5vmin;
                                background-repeat: no-repeat;
                                background-position: 0% 27%, 0% 73%, 77% 47%, 23% 52%;
                                transition: all 0.5s ease 0s;
                                filter: drop-shadow(1px 1px 1px #e1da1d) drop-shadow(-1px -1px 1px #e1da1d);
                            }

                            label[for=rs0]:hover:before {
                                --ar: #e1da1d;
                                transform: rotate(270deg);
                                transition: all 0.5s ease 0s;
                                filter:
                                    drop-shadow(-1px -1px 1px #e1da1d) drop-shadow(1px 1px 1px #e1da1d) drop-shadow(0px 5px 15px #e1da1d) drop-shadow(0px 5px 30px #e1da1d);
                            }


                            /*** Number ***/
                            .number {
                                position: absolute;
                                margin-top: 20.9vmin;
                                font-size: 3vmin;
                                font-family: Arial, serif;
                                color:#e1da1d;
                                z-index: -1;
                                filter:
                                    drop-shadow(1px 1px 1px #e1da1d) drop-shadow(-1px -1px 1px #e1da1d) drop-shadow(0px 0px 5px #e1da1d) drop-shadow(0px 0px 10px #008dff) drop-shadow(0px 0px 15px #008dff);
                            }

                            #rs0:checked~.number {
                                color:#e1da1d;
                                font-weight: bold;
                                filter:
                                    drop-shadow(1px 1px 1px #e1da1d) drop-shadow(-1px -1px 1px #e1da1d);
                                text-shadow: none;
                            }

                            .number:after {
                                content: "0";
                            }

                            #rs1:checked~.number:after {
                                content: "1";
                            }

                            #rs2:checked~.number:after {
                                content: "2";
                            }

                            #rs3:checked~.number:after {
                                content: "3";
                            }

                            #rs4:checked~.number:after {
                                content: "4";
                            }

                            #rs5:checked~.number:after {
                                content: "5";
                            }

                            <div id="Reviews" class="tabcontent">
                            <div class="rating-stars">
                                <input type="radio" name="rating" id="rs0"><label for="rs0"></label>
                                <input type="radio" name="rating" id="rs1"><label for="rs1"></label>
                                <input type="radio" name="rating" id="rs2"><label for="rs2"></label>
                                <input type="radio" name="rating" id="rs3" checked><label for="rs3"></label>
                                <input type="radio" name="rating" id="rs4"><label for="rs4"></label>
                                <input type="radio" name="rating" id="rs5"><label for="rs5"></label>
                                <span class="number"></span>
                            </div>
                        </div>












                        <!-- <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            let submitmain = document.querySelector("#submitmain");
                            let thankyouMessage = document.querySelector("#thankyouMessage");
                            let reviewForm = document.querySelector("#reviewform");

                            thankyouMessage.style.display = "none";

                            submitmain.addEventListener("click", function(event) {
                                event.preventDefault(); // Prevent form submission (if you're not using AJAX)

                                thankyouMessage.style.display = "block";
                                reviewForm.style.display = "none";


                                // Reset the form
                                if (reviewForm) {
                                    reviewForm.reset();
                                }

                            });
                        });

                      
                    </script> -->