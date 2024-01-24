let buttonArrays = [];
                    function buttonClicked(index) {
                    buttonArrays.push(index + 1);
                    let b2 = JSON.stringify(buttonArrays);
                    localStorage.setItem('pretes2', b2);
                    }