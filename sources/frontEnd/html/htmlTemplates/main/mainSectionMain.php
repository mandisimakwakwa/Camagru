<main>

    <div class="mainMainSubDivAClass">

        <div class="mainSubDivA11Class">

            <video id="camViewID"
                   class="camViewDivClass"
                    autoplay>
            </video>
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

        <button class="submitButtonClass disableButtonClass"
                id="saveButtonID"
                onclick="ft_saveToGalleryButton()"
        >

            Save
        </button>

        <div id="uploadFormModalID"
             class="modalClass">

            <div class="modalContentClass">

                <div class="uploadFormTitleDivClass">

                    <div class="placeHolderDivClass"></div>

                    <h1>Upload</h1>

                    <div class="placeHolderDivClass">

                        <button class="closeButtonClass"
                                onclick="ft_closeUploadForm()">

                            <div>X</div>
                        </button>
                    </div>
                </div>

                <form id="uploadFormID"
                      method="post"
                      enctype="multipart/form-data"
                      class="uploadFormClass"
                >

                    <h3 class="formTitleClass"><b>Select an Image to Upload: </b></h3>

                    <input type="file"
                           name="fileToUpload"
                           onchange="ft_uploadImageContent(this.files)"
                           id="uploadImageInput"
                           class="uploadButtonClass"
                    >
                </form>
            </div>
        </div>

        <button class="submitButtonClass"
                onclick="ft_uploadToGalleryButton()">

            Upload
        </button>
    </div>
    <div class="mainMainSubDivCClass"
    >

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

    <div id="commentsContainerDivID"
         class="modalClass divDebugClassThree"
    >

        <div class="uploadFormTitleDivClass">

            <div class="placeHolderDivClass"></div>

            <h1>Comments</h1>

            <div class="placeHolderDivClass">

                <button class="closeButtonClass"
                        onclick="ft_closeUploadForm()">

                    <div>X</div>
                </button>
            </div>
        </div>

        <div class="modalContentClass divDebugClassTwo"
             id="commentsDivID"
        >

            Hello
        </div>
    </div>
</main>