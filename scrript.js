let buttonArrayy = [];
                    function buttonClicked(index) {
                    buttonArrayy.push(index + 1);
                    let b3 = JSON.stringify(buttonArrayy);
                    localStorage.setItem('pretes3', b3);
                    }