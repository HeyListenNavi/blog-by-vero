export default () => ({
    index: 0,
    timer: null,
    frames: [
        `

   ╱|、
  (˚ˎ 。 7
  |、˜〵
  じしˍ,)つ
        `,
        `

   ╱|、
  (\`ˎ 。 7
  |、˜〵
  じしˍ,)づ
        `,
        `

   ╱|、
  (\`ˎ -    7
  |、˜〵
  じしˍ,)つ
        `,
        `
ᵐᵉᵒʷ
   ╱|、
  (\`ˎ -    7
  |、˜〵
  じしˍ,)づ
        `,
        `
ᵐᵉᵒʷ ♡
   ╱|、
  (\`ˎ -    7
  |、˜〵
  じしˍ,)つ
        `,
    ],
    destroy() {
        clearInterval(this.timer);
    },
    init() {
        this.timer = setInterval(() => {
            this.index = (this.index + 1) % this.frames.length;
        }, 1300);
    },
});
