let buttonArray = [];
                    function buttonClicked(index) {
                    buttonArray.push(index + 1);
                    let b = JSON.stringify(buttonArray);
                    localStorage.setItem('pretes1', b);
                    }

                    