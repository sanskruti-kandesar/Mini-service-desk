myApp.filter("colour", function() {
    return function(colour) {
        switch (colour) {
            case 1:
                return "Purple";
            case 2:
                return "Blue";
            case 3:
                return "Green";
        }
    }
})