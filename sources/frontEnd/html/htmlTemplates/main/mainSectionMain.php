<main>

    <div class="mainMainSubDivAClass">

        <div class="mainSubDivA11Class">

            <video id="camViewID"
                   class="camViewDivClass"
                    autoplay>
            </video>
            <script>ft_camDisplay();</script>
        </div>

        <div class="mainSubDivA2Class">

            <a class="roundButtonClass"
                    onclick="ft_snapButton()"
            >
                
                <img src="../../../../resources/icons/cameraIcon.png">
            </a>
        </div>

        <div class="mainSubDivA12Class">

            <canvas class="canvasViewClass"
                    id="canvasViewID">
            </canvas>
        </div>
    </div>

    <div class="mainMainSubDivBClass">

        <button class="submitButtonClass"
                onclick="ft_saveToGalleryButton()"
        >

            Save
        </button>

        <button class="submitButtonClass"
                onclick="ft_uploadToGalleryButton()">

            Upload
        </button>
    </div>
    <div class="mainMainSubDivCClass">

        <img src="../../../../resources/merges/1.png"
             id="1.png"
             class="mergeDivClass"
             onclick="ft_mergeLayer(this)"
        />

        <img src="../../../../resources/merges/2.png"
             id="2.png"
             class="mergeDivClass"
             onclick="ft_mergeLayer(this)"
        />

        <img src="../../../../resources/merges/3.png"
             id="3.png"
             class="mergeDivClass"
             onclick="ft_mergeLayer(this)"
        />

        <img src="../../../../resources/merges/4.png"
             id="4.png"
             class="mergeDivClass"
             onclick="ft_mergeLayer(this)"
        />
    </div>
</main>