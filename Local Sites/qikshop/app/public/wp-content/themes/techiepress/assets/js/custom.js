const exploreScrollContainer = document.querySelector("#exploreScroll");

if (exploreScrollContainer) {
  exploreScrollContainer.scrollLeft =
    exploreScrollContainer.scrollWidth - exploreScrollContainer.clientWidth;
}
