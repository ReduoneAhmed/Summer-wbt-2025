function checkContact() {
    var service = prompt("What service are you looking for");
    if (service === null || service.trim() === "") {
        alert("Kindly provide a valid service.");
    } else if (service === "Web Developer") {
        alert("You have selected: " + service);
    } else if (service === "Data Scientist") {
        alert("You have selected: " + service);
    } else if (service === "Frontend Developer") {
        alert("You have selected: " + service);
    } else {
        alert("Service not available: " + service);
    }

    var project = prompt("What Project do you want?");
    if (project === null || project.trim() === "") {
        alert("Please enter a valid Project.");
    } else if (project === "Full Stack Web Development") {
        alert("You have selected: " + project);
    } else if (project === "NLP") {
        alert("You have selected: " + project);
    } else if (project === "Data Science") {
        alert("You have selected: " + project);
    } else {
        alert("Project not available: " + project);
    }
}
