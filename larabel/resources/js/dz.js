import {Dropzone} from "dropzone";
Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#drop", {
    dictDefaultMessage: "Arrosega la imatge",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Elimiar Fitxer",
    maxFiles: 1,
    uploadMultiple: false,

})

dropzone.on("sending", (file, xhr, fromData)=>{
    console.log(file);
});
dropzone.on("success", (file, response)=>{
    document.getElementById("name_imge").value = response.nameImage;
});
dropzone.on("error", (file, message)=>{
    console.log(file);
});
dropzone.on("remuveFile", ()=>{
    console.log("Fitxer Eliminat");
});
