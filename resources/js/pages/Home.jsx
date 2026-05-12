import React from "react";
import Carousel from "../components/Carousel";
import ShopBy from "../components/ShopBy";
import GenInfo, { Brands } from "../components/GenInfo";

const Home = () => {
  return (
    <div className="max-w-screen-xl xs:w-[95vw] xs:max-w-[95vw] md:w-full mx-auto py-8 bg-white">
      <Carousel />
      <GenInfo />
      <Brands />
      <div className="md:w-full md:max-w-full xs:mx-2 sm:mx-auto grid gap-8 md:grid-cols-2 md:items-start md:px-3 mt-4">
        <div className="prose prose-2xl rounded-2xl border border-gray-400 bg-gradient-to-br from-white to-gray-50 p-6 shadow-sm hover:shadow-md transition-all hover:-translate-y-0.5">
          <ShopBy title="Best Sellers" filter="bestSellers" />
        </div>
        <div className="prose prose-2xl rounded-2xl border border-gray-400 bg-gradient-to-br from-white to-gray-50 p-6 shadow-sm hover:shadow-md transition-all hover:-translate-y-0.5">
          <ShopBy title="Top Rated" filter="topRated" />
        </div>
      </div>
    </div>
  );
};

export default Home;
