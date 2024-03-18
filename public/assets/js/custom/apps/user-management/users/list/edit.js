"use strict";

var KTUsersAddUser = function () {
    const modal = document.getElementById("kt_modal_edit_user");
    const form = modal.querySelector("#kt_modal_add_user_form");
    const modalInstance = new bootstrap.Modal(modal);

    return {
        init: function () {
            (() => {
                var formValidator = FormValidation.formValidation(form, {
                    fields: {
                        name: {
                            validators: {
                                notEmpty: {
                                    message: "Nama lengkap harus diisi"
                                }
                            }
                        },
                        email: {
                            validators: {
                                notEmpty: {
                                    message: "Email wajib diisi"
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: ""
                        })
                    }
                });

                // const submitBtn = modal.querySelector('[data-kt-users-modal-action="submit"]');
                // submitBtn.addEventListener("click", (event) => {
                //     event.preventDefault();
                //     formValidator && formValidator.validate().then((status) => {
                //         console.log("validated!");
                //         if (status === "Valid") {
                //             submitBtn.setAttribute("data-kt-indicator", "on");
                //             submitBtn.disabled = false;
                //             setTimeout(() => {
                //                 submitBtn.removeAttribute("data-kt-indicator");
                //                 submitBtn.disabled = false;
                //                 Swal.fire({
                //                     text: "Data berhasil diinput!",
                //                     icon: "success",
                //                     buttonsStyling: false,
                //                     confirmButtonText: "Ok, mengerti!",
                //                     customClass: {
                //                         confirmButton: "btn btn-primary"
                //                     }
                //                 }).then((result) => {
                //                     if (result.isConfirmed) {
                //                         modalInstance.hide();
                //                     }
                //                 });
                //             }, 2000);
                //         } else {
                //             Swal.fire({
                //                 text: "Sorry, looks like there are some errors detected, please try again.",
                //                 icon: "error",
                //                 buttonsStyling: false,
                //                 confirmButtonText: "Ok, got it!",
                //                 customClass: {
                //                     confirmButton: "btn btn-primary"
                //                 }
                //             });
                //         }
                //     });
                // });

                modal.querySelector('[data-kt-users-modal-action="cancel"]').addEventListener("click", (event) => {
                    event.preventDefault();
                    Swal.fire({
                        text: "Yakin ingin membatalkan ini?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Ya, batal!",
                        cancelButtonText: "Tidak, jangan",
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-active-light"
                        }
                    }).then((result) => {
                        if (result.value) {
                            form.reset();
                            modalInstance.hide();
                        } else if (result.dismiss === "cancel") {
                            Swal.fire({
                                text: "Your form has not been cancelled!.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        }
                    });
                });

                modal.querySelector('[data-kt-users-modal-action="close"]').addEventListener("click", (event) => {
                    event.preventDefault();
                    Swal.fire({
                        text: "Kamu yakin ingin membatalkan ini?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Ya, batal!",
                        cancelButtonText: "Tidak, jangan",
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-active-light"
                        }
                    }).then((result) => {
                        if (result.value) {
                            form.reset();
                            modalInstance.hide();
                        } else if (result.dismiss === "cancel") {
                            Swal.fire({
                                text: "Tidak jadi membatalkan!.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, mengerti!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        }
                    });
                });
            })();
        }
    };
}();

KTUtil.onDOMContentLoaded(() => {
    KTUsersAddUser.init();
});
