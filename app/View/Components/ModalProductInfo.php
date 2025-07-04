<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalProductInfo extends Component
{
    /**
     * Create a new component instance.
     */
    public $contents;

    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $this->contents = [
            'details' => 'A new interpretation to classic boots with its fully surrounding design and high front part details, it offers a secure and powerful option in challenging weather conditions. The rubber platform sole keeps the foot elevated from floor, and the custom-designed YKK zipper and metal-accented cotton laces ensure quality. The warm lining protects your feet from cold weather, and the rubber outsole with a pool and cushioned insole provides comfort and confidence.',

            'materials' => 'APPLE LEATHER
                Apple Leather is a revolutionary material derived from apple waste. As fresh as 2019, this innovative approach transforms discarded apple waste into versatile plant-based leather suitable for various application areas, from accessories to car seats and notebook covers to shoes and boots. Due to Apple’s natural composition of cellulose fibers and innovative production process, the mechanical strength of Apple Leather matches that of conventional synthetic fabrics (1).
                Apple Pomace (waste from the production of apples to make juice, jams, etc.) is an agricultural food waste that would be thermally destroyed or dumped into landfills. This waste can not be utilized to feed animals, as it carries the risk of developing fungus (2). Therefore, if not repurposed, apple waste poses a challenge to waste management (1). Keeping the apple waste from decomposing also prevents methane gas production during the decomposition process.
                Apple leather not only upcycles the apple waste but also significantly contributes to sustainable production. Comparing the carbon footprint of polyurethane (PU), whose negative impact on the environment is less than half of cow leather, to the recovered apple waste reveals a notable difference. While polyurethane bears a carbon footprint of 5.28 Kg CO2 eq/Kg PU, recovered waste demonstrates an impact of zero carbon footprint. Consequently, each kilogram of apple residuals replacing polyurethane saves 5.28 kilograms of CO2 emissions (1). Although not 100% biodegradable, apple leather can be up to 50% plant-based, which is one of its key environmental benefits. Apple Leather is hypoallergenic, breathable, UV-resistant, water-resistant, scratch-resistant, and long-lasting when cared properly. Needless to say, it is vegan and cruelty-free.
                The waste from apples (apple pomace) is transformed into a fine powder. This fine powder is then mixed with water-based PU as a binding agent. This mixture is then spread over the lining, which can be made of cotton, polyester, or a mixture of the two. Lastly, rollers give texture to the material. Most Apple Leather is made in Northern Italy, which has a large apple industry.
                Sources:
                (1) https://mabelindustries.com/index.php/sustainability, (2) https://www.watsonwolfe.com/2022/06/01/all-you-need-to-know-about-apple-leather
                Natural Rubber and Neolite Soles
                Rubber, known for its durability and water-resistant properties, make it an ideal material for footwear. Rubber soles offer exceptional traction and stability, ensuring slip resistance and suitability for various weather conditions. With inherent shock-absorbing qualities, rubber soles provide comfort by cushioning the impact while walking.
                Neolite soles integrate innovative technologies into their design, providing enhanced comfort, support, and performance. They maintain a lightweight design without compromising durability, crafted from long-lasting materials for reliability in diverse conditions.',

            'aftercare' => "Protect your shoes from excess sun or heat, moisture, and harsh cleaning products, including alcohol-based ones. Gently wipe your shoes with a damp cloth, and never wash them in the washing machine.
                If you're not wearing a summer collection, do not wear your shoes with bare feet. Always be sure to wear the right socks.
                 You can use a shoe polish made for animal-based leather. It works on plant-based leather as well.
                    Avoid getting your shoes extremely wet. If they get wet, avoid exposure to direct sunlight or heat sources like radiators. Let them dry at room temperature without closing them in a box.
                    When storing your shoes, use a shoe tree or crumpled paper to avoid folding or pressing and to protect the structure.
                    Over time, cracks and scratches may occur naturally due to use. This happens because of the nature of all materials.
                    The 'one day apart' rule, which is valid for all leather shoes, is also useful for plant-based leather shoes. Wearing your shoes on alternate days will help them last longer and prevent them from smelling.
                    Thank you for reading and caring about this guide! We can't wait to take the first steps of the revolution together.
                ",

            'manufacturing' => 'Although with a global mission and vision, Prev is a locally-produced brand that works with a small number of selected ateliers to manufacture its products. When selecting their manufacturing partners, they pay great attention to ensuring that the employees work fair hours and earn at least the minimum wage. They also try their best to work with ateliers that employ female workers.
                Although our commitment to ethical production may cause delays and problems in the production process from time to time, we always put and continue to put ethical production at the forefront. We see informing everyone about these processes as part of supporting ethical production so that our customers can tolerate these delays
                We encourage our manufacturing partners that use animal leather to discover plant-based leather with us, and together we lay the foundations for the spread of vegan production. We work with multiple ateliers, making sure that each atelier produces the types of products and models in their area of expertise.'
            ];
        return view('components.modal-product-info');
    }
}
