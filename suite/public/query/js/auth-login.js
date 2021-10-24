let dynamicPlace = $("#dynamicPlace");
let studentNumber = $(".studentNumber");
let StudentDetails = $(".StudentDetails");

function removeStudent(number) {
    // Remove The Tab
    let mcg = dynamicPlace.val().split(",");
    if (mcg.length == 2) {
        swal({
            type: 'info',
            title: 'Sorry!',
            text: '{{ tr("You have to register at least one student.") }}',
            buttonsStyling: false,
            confirmButtonClass: 'btn btn-lg btn-info'
        })
        return;
    }
    // Check The Tab in Database
    $(".student-" + number).remove();
    let carIndex = mcg.indexOf(number.toString());
    mcg.splice(carIndex, 1);

    // Replace Tab Index in Database
    dynamicPlace.val(mcg.join());

    // Minimize Number
    studentNumber.val(Number(studentNumber.val()) - 1);

}

function addContent(id) {
    let content = `<div class="student-` + id + `">
                        <div class="form-group form-container m-1" style="box-shadow: 0 0 3px 1px #ccc">
                            <div style="overflow:hidden;">
                                <a href="javascript:void(0)" onclick="removeStudent(` + id + `)"
                                   class="btn btn-danger float-right"><i class="i-Close"></i>
                                    Remove</a>
                            </div>
                            <div class="row">
                                <div class="col-md-5 col-sm-8">
                                    <label for="student-` + id + `-name" class="form-label">Student name</label>
                                    <div>
                                        <input type="text" class="form-control" name="student-` + id + `-name"
                                               id="student-` + id + `-name">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <label for="student-` + id + `-birthdate" class="form-label">Birth Date</label>
                                    <div>
                                        <input type="date" class="form-control" name="student-` + id + `-birthdate"
                                               id="student-` + id + `-birthdate">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <label for="student-` + id + `-gender" class="form-label">Gender</label>
                                    <div>
                                        <select name="student-` + id + `-gender" id="student-` + id + `-gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="student-` + id + `-subject" class="form-label">Select Subjects</label>
                                    <div>
                                        <select name="student-` + id + `-subject" multiple="multiple" id="student-` + id + `-subject">
                                            <option value="Quran recitation">Quran recitation</option>
                                            <option value="Quran memorization">Quran memorization</option>
                                            <option value="Arabic language">Arabic language</option>
                                            <option value="Islamic studies">Islamic studies</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="student-` + id + `-class-duration" class="form-label">Select Class
                                        Duration</label>
                                    <div>
                                        <select name="student-` + id + `-gender" id="student-` + id + `-class-duration">
                                            <option value="30"> 30 minutes</option>
                                            <option value="45"> 45 minutes</option>
                                            <option value="60"> 60 minutes</option>
                                            <option value="90"> 90 minutes</option>
                                            <option value="120"> 12 minutes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;


    $(".auto-form").append(content);
}

function addStudent(process = true) {

    let id = Math.floor(Math.random() * 100415404110441120214);
    addContent(id);

    // Add id to The Database

    // Check The Tab in Database
    let mcg = dynamicPlace.val().split(",");
    mcg.push(id);

    // Replace Tab Index in Database
    dynamicPlace.val(mcg.join());

    // Add Number
    studentNumber.val(Number(studentNumber.val()) + 1);

    // Make The Form Selectize
    if (process) {
        selectize();
    }

    return id;
}


// Process Refresh Mode

dynamicPlace.val("");
studentNumber.val(0);
if (StudentDetails.val() !== '') {
    data = JSON.parse(StudentDetails.val());
    console.log(data);
    for (let j = 0; j < data.length; j++) {
        let id = addStudent(false);
        $("#student-" + id + "-name").val(data[j]['StudentName']);
        $("#student-" + id + "-birthdate").val(data[j]['BirthDate']);
        $("#student-" + id + "-gender").val(data[j]['Gender']);
        $("#student-" + id + "-subject").val(data[j]['Subject']).change();
        $("#student-" + id + "-class-duration").val(data[j]['ClassDuration']).change();

        selectize();
    }
} else {
    addStudent();
}


// Process Form Data
function loadForm(event, form) {

    // Check Student Registration
    let data = dynamicPlace.val().split(",");
    if (data.length == 2) {
        if (empty($("#student-" + data[1] + "-name").val()) || empty($("#student-" + data[1] + "-birthdate").val()) || empty($("#student-" + data[1] + "-subject").val())) {
            swal({
                type: 'info',
                title: 'Sorry!',
                text: 'You have to register at least one student properly. Empty or Non-valid fields there.',
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-lg btn-info'
            })
            event.preventDefault();
        }
    }
    let studentDetails = [];

    // Get The Database
    let mcg = dynamicPlace.val().split(",");

    for (let i = 1; i < mcg.length; i++) {
        studentDetails.push({
            "StudentName": $("#student-" + mcg[i] + "-name").val(),
            "BirthDate": $("#student-" + mcg[i] + "-birthdate").val(),
            "Gender": $("#student-" + mcg[i] + "-gender").val(),
            "Subject": $("#student-" + mcg[i] + "-subject").val(),
            "ClassDuration": $("#student-" + mcg[i] + "-class-duration").val(),
        });
    }

    StudentDetails.val(JSON.stringify(studentDetails));

    // $(form).submit();

    // console.log($(form).serializeArray());
}

function empty(string) {
    return (string === '' || $.trim(string) === '' || string == null || string.length === 0);
}
