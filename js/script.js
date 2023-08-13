angular.module('myApp', [])
.controller('SliderController', function($scope, $interval) {
    $scope.images = [
        { src: "img/examplePic/image1.png", alt: "Image 1" },
        { src: "img/examplePic/image2.png", alt: "Image 2" },
        { src: "img/examplePic/image3.png", alt: "Image 3" },
        { src: "img/examplePic/image4.png", alt: "Image 4" },
        { src: "img/examplePic/image5.png", alt: "Image 5" },
        { src: "img/examplePic/image6.png", alt: "Image 6" }
    ];

    $scope.currentIndex = 0;
    $scope.autoLoopInterval = startAutoLoopInterval();

    function startAutoLoopInterval() {
        return $interval(function() {
            $scope.slideTo($scope.currentIndex + 1);
        }, 3000);
    }

    function resetAutoLoopInterval() {
        $interval.cancel($scope.autoLoopInterval);
        $scope.autoLoopInterval = startAutoLoopInterval();
    }

    $scope.slideTo = function(index) {
        $scope.currentIndex = (index + $scope.images.length) % $scope.images.length;
        $scope.updateIndexIndicator();
        resetAutoLoopInterval();
    };

    $scope.updateIndexIndicator = function() {
        angular.forEach($scope.images, function(image, index) {
            image.current = (index === $scope.currentIndex);
        });
    };

    $scope.$on('$destroy', function() {
        $interval.cancel($scope.autoLoopInterval);
    });
});