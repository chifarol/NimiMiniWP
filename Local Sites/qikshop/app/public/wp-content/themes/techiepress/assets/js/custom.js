const exploreScrollContainer = document.querySelector("#exploreScroll");

exploreScrollContainer.scrollLeft =
  exploreScrollContainer.scrollWidth - exploreScrollContainer.clientWidth;
