if (document.getElementById('mainRoutineDashboard')) {
    let exercises = document.getElementById('exercisesDashboard');
    let backToDashboardBtn = document.querySelector('.backToDashboard');
    backToDashboardBtn.addEventListener("click", function() {
        window.location.href = "dashboard.php";
    });
    for(let i = 0; i < exercises.childElementCount; i++)
    {
        let exercise = exercises.children[i].children[0].children;
        for(let j = 2; j < exercise.length - 2; j++)
        {
            let reps1 = exercise[j].children[2];
            let reps2 = exercise[j+1].children[2];
            let weight1 = exercise[j].children[1];
            let weight2 = exercise[j+1].children[1];

            reps1.style.backgroundColor = "gray";
            reps2.style.backgroundColor = "gray";
            weight1.style.backgroundColor = "gray";
            weight2.style.backgroundColor = "gray";

            if(parseInt(reps2.textContent) > parseInt(reps1.textContent))
            {
                reps1.style.backgroundColor = "green";
            }
            if(parseInt(reps2.textContent) == parseInt(reps1.textContent))
            {
                reps1.style.backgroundColor = "orange";
            }
            if(parseInt(reps2.textContent) < parseInt(reps1.textContent))
            {
                reps1.style.backgroundColor = "red";
            }

            if(parseInt(weight2.textContent) > parseInt(weight1.textContent))
            {
                weight1.style.backgroundColor = "green";
                reps1.style.backgroundColor = "green";
            }
            if(parseInt(weight2.textContent) == parseInt(weight1.textContent))
            {
                weight1.style.backgroundColor = "orange";
            }
            if(parseInt(weight2.textContent) < parseInt(weight1.textContent))
            {
                weight1.style.backgroundColor = "red";
            }
        }
    }
}
