import { PageFlip } from "page-flip";

export default (pages = []) => ({
    pageFlip: null,
    currentPage: 0,
    totalPages: 2,
    show: false,
    pages,

    init() {
        const bookElement = this.$refs.book;
        if (!bookElement) {
            return;
        }

        Alpine.nextTick(() => {
            this.pageFlip = new PageFlip(bookElement, {
                width: 400,
                height: 550,
                size: "stretch",
                maxWidth: 600,
                maxShadowOpacity: 0.1,
                mobileScrollSupport: false,
            });

            const pages = bookElement.querySelectorAll(".page");
            this.pageFlip.loadFromHTML(pages);
            this.totalPages = this.pageFlip.getPageCount();

            this.pageFlip.on("flip", (e) => {
                this.currentPage = e.data;
            });
        })
    },
});
